<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Institutes;
use App\Models\User;
use App\Models\City;
use App\Models\Locality;
use App\Models\Faculties;
use App\Models\Courses;
use App\Models\Examinations;
use Alert;

class InstituteController extends Controller
{

    public function __construct()
    {
        $this->middleware('inst');
    }

    public function index()
    {
        return view('institute.admin.index');
    }

    public function courses()
    {
        $inst_id = auth()->user()->institute_id;
        $institute = Institutes::find($inst_id);
        $courses = Courses::where('institute_id', $inst_id)->get();

        return view('institute.admin.courses.index', [
            'courses' => $courses,
        ]);
    }

    public function create_course()
    {
        $inst_id = auth()->user()->institute_id;
        $institute = Institutes::find($inst_id);
        $faculties = Faculties::where('institute_id', $inst_id)->get();
        $examinations = Examinations::all();

        return view('institute.admin.courses.create', [
            'institute' => $institute,
            'faculties' => $faculties,
            'examinations' => $examinations,
        ]);
    }

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

    public function store_course(Request $request)
    {}

    public function update_course(Request $request, $id)
    {}

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

    public function faculties()
    {
        $faculties = Faculties::where('institute_id', auth()->user()->institute_id)->get();

        return view('institute.admin.faculties.index', [
            'faculties' => $faculties,
        ]);
    }

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

    public function store_faculty(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'experience' => 'required|integer',
        ]);

        $inst_id = auth()->user()->institute_id;
        $institute = Institutes::find($inst_id);
        if ($institute == null){
            Alert::error('Oops!', 'Something went wrong :(');
            return redirect()->back()->withInput();
        }

        $faculty = new Faculties();
        if ($faculty == null){
            Alert::error('Oops!', 'Something went wrong :(');
            return redirect()->back()->withInput();
        }
        $faculty->name = $request->name;
        $faculty->qualification = $request->qualification;
        $faculty->experience = $request->experience;
        $faculty->institute_id = $inst_id;
        $faculty->save();

        Alert::success('Success!', 'Faculty added successfully :D');
        return redirect()->route('institute.dashboard.faculties.index');
    }

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

    public function update_faculty(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'experience' => 'required|integer',
        ]);

        $faculty = Faculties::find($id);
        if ($faculty == null){
            Alert::error('Oops!', 'Something went wrong :(');
            return redirect()->back()->withInput();
        }
        $faculty->name = $request->name;
        $faculty->qualification = $request->qualification;
        $faculty->experience = $request->experience;
        $faculty->save();

        Alert::success('Success!', 'Faculty updated successfully :D');
        return redirect()->route('institute.dashboard.faculties.index');
    }

    public function user()
    {
        return view('institute.admin.user.index');
    }

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
}
