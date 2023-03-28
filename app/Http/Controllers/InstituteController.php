<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\City;
use App\Models\User;
use App\Enums\Timing;
use App\Models\Leads;
use App\Enums\Session;
use App\Models\Courses;
use App\Models\Bookings;
use App\Models\Locality;
use App\Models\Faculties;
use App\Models\Institutes;
use Illuminate\Support\Str;
use App\Models\Examinations;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class InstituteController extends Controller
{

    public function __construct()
    {
        $this->middleware('inst');
    }
    
    /**
     * index - Institute dashboard
     *
     * @return void
     */
    public function index()
    {
        return view('institute.admin.index');
    }
    
    /**
     * saveCover - Save institute cover image to storage
     *
     * @param  mixed $file
     * @param  mixed $inst
     * @return void
     */
    public function saveCover($file, $inst)
    {
        try{
            $filename = $inst->id . '_cover.' . $file->getClientOriginalExtension();    
            $file->storeAs('images' . DIRECTORY_SEPARATOR . 'tmp', $filename);
            $inst->clearMediaCollection('institute_cover');
            $inst->addMedia(storage_path('app' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'tmp') . DIRECTORY_SEPARATOR . $filename)
                ->toMediaCollection('institute_cover');
            Storage::disk('local')->delete(storage_path('images' . DIRECTORY_SEPARATOR . 'tmp') . DIRECTORY_SEPARATOR . $filename);
            return true;
        }catch(\Exception $e){
            dd($e->getMessage());
            return false;
        }
    }
    
    /**
     * cover_update - Update institute cover image
     *
     * @param  mixed $request
     * @return void
     */
    public function cover_update(Request $request)
    {
        $request->validate([
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $inst_id = auth()->user()->institute_id;
        $institute = Institutes::find($inst_id);        
        if ($this->saveCover($request->cover, $institute)){
            Alert::success('Success', 'Cover updated successfully!');
            return redirect()->back();
        }

        Alert::error('Error', 'Something went wrong!');
        return redirect()->back();
    }

    /* Institute Courses
    
    methods: courses, create_course, store_course, edit_course, update_course, delete_course
    
    */

    public function courses()
    {
        $inst_id = auth()->user()->institute_id;
        $institute = Institutes::find($inst_id);
        $courses = Courses::where('institute_id', $inst_id)->get();

        return view('institute.admin.courses.index', [
            'courses' => $courses,
        ]);
    }
    
    /**
     * create_course - Display view page for creating new course
     *
     * @return void
     */
    public function create_course()
    {
        $inst_id = auth()->user()->institute_id;
        $faculties = Faculties::where('institute_id', $inst_id)->get();
        $examinations = Examinations::all();

        return view('institute.admin.courses.create', [
            'faculties' => $faculties,
            'examinations' => $examinations,
        ]);
    }    
    
    /**
     * store_course - Store new course in database
     *
     * @param  mixed $request
     * @return void
     */
    public function store_course(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $rules = [
            'name' => 'required|string|max:255',            
            'total_fee' => 'numeric',
            'description' => 'required',
            'faculties' => 'required',
            'examination' => 'string|exists:examinations,id',
            'start_date' => 'date',
            'end_date' => 'date',
            'timings' => 'required',
            'video' => 'string',
        ];
        $validator = Validator::make($data, $rules);
        $errMessages = $validator->errors()->messages();
        $err = "\n";
        foreach($errMessages as $key => $value){
            $err .= $value[0] . "\n";
        }
        if ($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => "Oops :( Looks like you have a few errors\n" . $err,
            ]);
        }

        $inst_id = auth()->user()->institute_id;
        $institute = Institutes::find($inst_id);

        $faculties = Faculties::where('institute_id', $inst_id)->get();
        $examinations = Examinations::all();

        foreach($request->faculties as $faculty){
            if (!$faculties->contains('id', $faculty)){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Could not find faculty :(',
                ]);
            }
        }

        if (!$examinations->contains('id', $request->examination)){
            return response()->json([
                'status' => 'error',
                'message' => 'Could not find examination :(',
            ]);
        }

        try{
            $course = new Courses();
            $course->name = $request->name;
            $course->institute_id = $inst_id;
            $course->description = $request->description;
            $course->fees = $request->total_fee;
            $course->start_date = $request->start_date;
            $course->end_date = $request->end_date;
            $course->examination_id = $request->examination;
            $course->faculties = $request->faculties;

            $weekdays = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
            $weekends = ['sat', 'sun'];

            $session = null;
            $timing = null;

            foreach($request->timings as $timing){
                $day = $timing[0];
                $start_time = str_split($timing[1], 2);
                $end_time = str_split($timing[2], 2);

                if (in_array($day, $weekdays)){
                    if ($session == Session::WEEKEND){
                        $session = Session::BOTH;
                    }
                    $session = Session::WEEKDAY;
                } else if (in_array($day, $weekends)){
                    if ($session == Session::WEEKDAY){
                        $session = Session::BOTH;
                    }
                    $session = Session::WEEKEND;
                }

                if ($start_time[0] < 12){
                    if ($timing == Timing::EVENING){
                        $timing = Timing::BOTH;
                    }
                    $timing = Timing::FORENOON;
                } else if ($start_time[0] >= 12){
                    if ($timing == Timing::FORENOON){
                        $timing = Timing::BOTH;
                    }
                    $timing = Timing::EVENING;
                } else {
                    $timing = Timing::BOTH;
                }            
            }

            $course->session = $session;
            $course->timing = $timing;
            $course->course_timings = $request->timings;            

            $course->status = Courses::enum('status')->values()[0];
            $course->availability = Courses::enum('availability')->values()[0];

            $course->slug = Str::slug($request->name, '-');
            $course->video_url = $request->video;

            $course->save();

            foreach($request->faqs as $faq){
                $course->faqs()->create([
                    'question' => $faq['question'],
                    'answer' => $faq['answer'],
                    'course_id' => $course->id,
                ]);
            }

            /* $video = Http::post(route('institute.services.video.store'), [
                'video' => $request->video,
                'course_id' => $course->id,
            ]);

            if ($video['status'] == 'error'){
                return response()->json([
                    'status' => 'error',
                    'message' => $video['message'],
                ]);
            } */

            return response()->json([
                'status' => 'success',
                'message' => 'Course created successfully :)',
            ]);
        } catch (\Exception $e){
            dd($e);
            return response()->json([
                'status' => 'error',
                'message' => 'Could not create course :(',
            ]);
        }

    }
    
    /**
     * update_course - Update course details
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update_course(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',            
            'total_fee' => 'numeric',
            'description' => 'required',
            'faculties' => 'required',
            'examination' => 'string|exists:examinations,id',
            'start_date' => 'date',
            'end_date' => 'date',
            'faqs' => 'required',
            'timings' => 'required',
            'status' => 'required',
            'availability' => 'required',
        ]);;

        $inst_id = auth()->user()->institute_id;
        $institute = Institutes::find($inst_id);

        $faculties = Faculties::where('institute_id', $inst_id)->get();
        $examinations = Examinations::all();

        foreach($request->faculties as $faculty){
            if (!$faculties->contains('id', $faculty)){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Could not find faculty :(',
                ]);
            }
        }

        if (!$examinations->contains('id', $request->examination)){
            return response()->json([
                'status' => 'error',
                'message' => 'Could not find examination :(',
            ]);
        }

        try{
            $course = Courses::find($id);
            if ($course == null){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Could not find course :(',
                ]);
            }
            $course->name = $request->name;
            $course->institute_id = $inst_id;
            $course->description = $request->description;
            $course->fees = $request->total_fee;
            $course->start_date = $request->start_date;
            $course->end_date = $request->end_date;
            $course->examination_id = $request->examination;
            $course->faculties = $request->faculties;

            $weekdays = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
            $weekends = ['sat', 'sun'];

            $session = null;
            $timing = null;

            foreach($request->timings as $timing){
                $day = $timing['day'];
                $start_time = str_split($timing['start_time'], 2);

                if (in_array($day, $weekdays)){
                    if ($session == Session::WEEKEND){
                        $session = Session::BOTH;
                    }
                    $session = Session::WEEKDAY;
                } else if (in_array($day, $weekends)){
                    if ($session == Session::WEEKDAY){
                        $session = Session::BOTH;
                    }
                    $session = Session::WEEKEND;
                }

                if ($start_time[0] < 12){
                    if ($timing == Timing::EVENING){
                        $timing = Timing::BOTH;
                    }
                    $timing = Timing::FORENOON;
                } else if ($start_time[0] >= 12){
                    if ($timing == Timing::FORENOON){
                        $timing = Timing::BOTH;
                    }
                    $timing = Timing::EVENING;
                } else {
                    $timing = Timing::BOTH;
                }
            }

            $course->session = $session;
            $course->timing = $timing;
            $course->course_timings = $request->timings;
            $course->faqs = $request->faqs;

            $course->status = $request->status;
            $course->availability = $request->availability;

            $course->slug = Str::slug($request->name, '-');

            $course->save();

            $faqs = Faqs::where('course_id', $course->id)->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Course updated successfully :)',
            ]);

        }catch (\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Could not update course :(',
            ]);
        }
            

    }
    
    /**
     * edit_course - Show view page to edit a course
     *
     * @param  mixed $id
     * @return void
     */
    public function edit_course($id)
    {
        $course = Courses::find($id);
        if ($course == null){
            Alert::error('Oops!', 'Could not find course :(');
            return redirect()->back()->withInput();
        }
        $inst_id = $course->institute_id;
        $institute = Institutes::find($inst_id);
        $faculties = Faculties::where('institute_id', $inst_id)->get();
        $examinations = Examinations::all();

        return view('institute.admin.courses.edit', [
            'institute' => $institute,
            'faculties' => $faculties,
            'examinations' => $examinations,
            'course' => $course,
        ]);
    }
    
    /**
     * delete_course - Delete a course
     *
     * @param  mixed $id
     * @return void
     */
    public function delete_course($id)
    {
        $course = Courses::find($id);
        if ($course == null){
            Alert::error('Oops!', 'Could not find course :(');
            return redirect()->back()->withInput();
        }
        $course->delete();
        Alert::success('Success!', 'Course deleted successfully :D');
        return redirect()->route('institute.dashboard.courses.index');
    }   
    
    /* Institute profile 
    
    methods: profile, profile_update
    
    */
    
    /**
     * profile - Show institute profile page
     *
     * @return void
     */
    public function profile()
    {

        $inst_id = auth()->user()->institute_id;
        $institute = Institutes::find($inst_id);
        $city = City::all();
        $locality = Locality::all();

        return view('institute.admin.profile.index', [
            'institute' => $institute,
            'cities' => $city,
            'localities' => $locality,
        ]);
    }
        
    /**
     * profile_update - Update institute profile
     *
     * @param  mixed $request
     * @return void
     */
    public function profile_update(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|integer|exists:cities,id',
            'locality' => 'required|integer|exists:localities,id',
            'address' => 'required|string|max:255'
        ]);

        $inst_id = auth()->user()->institute_id;
        $institute = Institutes::find($inst_id);
        if ($institute == null){
            Alert::error('Oops!', 'Something went wrong :(');
            return redirect()->back()->withInput();
        }
        $institute->name = $request->name;
        $institute->email = $request->email;
        $institute->phone = $request->phone;
        $institute->city_id = $request->city;
        $institute->locality_id = $request->locality;
        $institute->address = $request->address;
        $institute->save();

        Alert::success('Success!', 'Profile updated successfully :D');
        return redirect()->route('institute.dashboard.profile.index');
    }


    /* Institute faculties
    
    methods: faculties, delete_faculty, store_faculty, edit_faculty, update_faculty

    */
    
    /**
     * faculties - Show institute faculties page
     *
     * @return void
     */
    public function faculties()
    {
        $faculties = Faculties::where('institute_id', auth()->user()->institute_id)->get();

        return view('institute.admin.faculties.index', [
            'faculties' => $faculties,
        ]);
    }
    
    /**
     * delete_faculty - Delete a faculty
     *
     * @param  mixed $id
     * @return void
     */
    public function delete_faculty($id)
    {
        $user = Faculties::find($id);
        if ($user == null){
            Alert::error('Oops!', 'Something went wrong :(');
            return redirect()->back()->withInput();
        }
        $user->delete();
        Alert::success('Success!', 'Faculty deleted successfully :D');
        return redirect()->route('institute.dashboard.faculties.index');
    }
    
    /**
     * store_faculty - Store a faculty in database
     *
     * @param  mixed $request
     * @return void
     */
    public function store_faculty(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'experience' => 'required|integer',
            'subjects' => 'required',
        ]);

        $response = [];

        if (gettype($request->subjects) != 'array'){
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong :(',
            ]);
        }

        if ($request->subjects == []){
            return response()->json([
                'status' => 'error',
                'message' => 'Please select at least one subject :(',
            ]);
        }

        if (count($request->subjects) > 5){
            return response()->json([
                'status' => 'error',
                'message' => 'You can select maximum 5 subjects :(',
            ]);
        }

        $inst_id = auth()->user()->institute_id;
        $institute = Institutes::find($inst_id);
        if ($institute == null){
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong :(',
            ]);
        }

        $faculty = new Faculties();
        if ($faculty == null){
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong :(',
            ]);
        }
        $faculty->name = $request->name;
        $faculty->qualification = $request->qualification;
        $faculty->experience = $request->experience;
        $faculty->institute_id = $inst_id;
        $faculty->subjects = $request->subjects;
        $faculty->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Faculty added successfully :D',
        ]);
    }
    
    /**
     * edit_faculty - Show edit faculty page
     *
     * @param  mixed $id
     * @return void
     */
    public function edit_faculty($id)
    {
        $faculty = Faculties::find($id);
        if ($faculty == null){
            Alert::error('Oops!', 'Something went wrong :(');
            return redirect()->back()->withInput();
        }
        return view('institute.admin.faculties.edit', [
            'faculty' => $faculty,
        ]);
    }
    
    /**
     * update_faculty - Update faculty
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update_faculty(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'experience' => 'required|integer',
            'subjects' => 'required',
        ]);

        $response = [];

        if (gettype($request->subjects) != 'array'){
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong :(',
            ]);
        }

        if ($request->subjects == []){
            return response()->json([
                'status' => 'error',
                'message' => 'Please select at least one subject :(',
            ]);
        }

        if (count($request->subjects) > 5){
            return response()->json([
                'status' => 'error',
                'message' => 'You can select maximum 5 subjects :(',
            ]);
        }

        $faculty = Faculties::find($id);
        if ($faculty == null){
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong :(',
            ]);
        }
        $faculty->name = $request->name;
        $faculty->qualification = $request->qualification;
        $faculty->experience = $request->experience;
        $faculty->subjects = $request->subjects;
        $faculty->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Faculty updated successfully :D',
        ]);
    }


    /* Institute Admin user

    Methods: user, user_update
    
    */
    
    /**
     * user - Show institute admin user page
     *
     * @return void
     */
    public function user()
    {
        return view('institute.admin.user.index');
    }
    
    /**
     * user_update - Update institute admin user
     *
     * @param  mixed $request
     * @return void
     */
    public function user_update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|integer',
            'password' => 'string|min:8|nullable',
            'new_password' => 'string|min:8|required_with:password|nullable',
            'new_password_confirmation' => 'string|min:8|same:new_password|required_with:password|nullable',
        ]);

        $user = User::find(auth()->user()->id);
        if ($user == null){
            Alert::error('Oops!', 'Something went wrong :(');
            return redirect()->back()->withInput();
        }
        $inst = Institutes::find(auth()->user()->institute_id);

        if ($request->password != null){
            if ($user->password == bcrypt($request->password)){
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->password = bcrypt($request->new_password);
                $user->save();

                $inst->email = $request->email;
                $inst->phone = $request->phone;
                $inst->save();

                Alert::success('Success!', 'Your profile has been updated successfully :D');
                return redirect()->route('institute.dashboard.user.index');
            }else{
                Alert::error('Oops!', 'Your current password does not match with our records :(');
                return redirect()->back()->withInput();
            }
        }else{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();

            $inst->email = $request->email;
            $inst->phone = $request->phone;
            $inst->save();

            Alert::success('Success!', 'Your profile has been updated successfully :D');
            return redirect()->route('institute.dashboard.user.index');
        }
    }


    /* Institute Leads 
    

    
    */

    public function leads()
    {
        /* $leads = Leads::where('institute_id', auth()->user()->institute_id)->get(); */
        $users = [
            [
                'name' => 'John Doe',
                'course' => Courses::first() ? Courses::first()->name : 'JEE Coaching',
                'status' => Leads::enum('status')->values()[1],
            ],
            [
                'name' => 'John Doe',
                'course' => Courses::first() ? Courses::first()->name : 'JEE Coaching',
                'status' => Leads::enum('status')->values()[2],
            ],
            [
                'name' => 'John Doe',
                'course' => Courses::first() ? Courses::first()->name : 'JEE Coaching',
                'status' => Leads::enum('status')->values()[3],
            ],
        ];
        return view('institute.admin.leads.index', [
            'users' => $users,
        ]);
    }


    /* Institute Bookings 
    

    
    */

    public function bookings()
    {
        /* $bookings = Bookings::where('institute_id', auth()->user()->institute_id)->get(); */
        $users = [
            [
                'name' => 'John Doe',
                'course' => Courses::first() ? Courses::first()->name : 'JEE Coaching',
                'status' => Bookings::enum('status')->values()[1],
            ],
            [
                'name' => 'John Doe',
                'course' => Courses::first() ? Courses::first()->name : 'JEE Coaching',
                'status' => Bookings::enum('status')->values()[2],
            ],
            [
                'name' => 'John Doe',
                'course' => Courses::first() ? Courses::first()->name : 'JEE Coaching',
                'status' => Bookings::enum('status')->values()[3],
            ],
        ];
        return view('institute.admin.bookings.index', [
            'users' => $users,
        ]);
    }
}
