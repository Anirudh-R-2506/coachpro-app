<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Enums\Education;
use App\Enums\UserRole;
use App\Enums\AccountStatus;
use App\Helpers\DiscordHelper;
use RealRashid\SweetAlert\Facades\Alert;
use App\Rules\ReCaptchaRule;
use App\Models\City;
use App\Models\Institutes;
use App\Models\Locality;
use Illuminate\Auth\Events\Registered;
use App\Models\UserVerify;
use App\Jobs\SendAccountVerificationMail;

class LoginController extends Controller
{

    private function city()
    {
        return City::find(1)->first()->id;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'redirect' => 'nullable|url',            
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {

            if (Auth::user()->status == AccountStatus::UNVERIFIED) {
                if (Auth::user()->role == UserRole::STUDENT){
                    Alert::error('Oops!', 'Your account is not verified yet. Please check your inbox or spam for the verification mail :)');
                    return redirect()->back()->withInput();
                }
                Alert::error('Oops!', 'Your account is not verified yet. Please contact us for more details.');
                return redirect()->back()->withInput();
            }
            
            $request->session()->regenerate();
            if ($request->redirect != null){
                return redirect()->to($request->redirect);
            }
            if (Auth::user()->role == UserRole::INSTITUTE) {
                return redirect()->route('institute.index');
            }
            return redirect()->route('institute.index');
        }
        
        Alert::error('Oops!', 'Incorrect email or password. Please try again :(');
        return redirect()->back()->withInput();     
    }

    public function logout(Request $request)
    {
        $route = Auth::user()->role == UserRole::STUDENT ? 'frontend.signin' : 'institute.signin';
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route($route);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        event(new Registered($user));

        if ($user)
        {
            Alert::success('Success', 'You have succesfully taken your first step towards success :) Check your email to verify your account and login again to continue');
            return redirect()->back();
        }

        Alert::error('Oops!', 'There were a few hiccups while trying to get you on board :( Please try again later');
        return redirect()->back()->withInput();
    }

    public function register_cs(Request $request)
    {
        $request->validate([
            //'recaptcha_token' => env('APP_ENV') == 'local' ? '' : ['required', new ReCaptchaRule($request->recaptcha_token)],
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'education' => 'required|string|min:2',
            'class' => 'required_if:education,==,school',
            'year_of_passing' => 'required_if:education,==,ug|required_if:education,==,pg',
        ]);

        $edu = Education::getEnum($request->education);
        $user_exists = User::where('phone', $request->phone)->first();
        if (!$user_exists){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'education' => $edu,
                'role' => UserRole::STUDENT,
                'city' => $this->city(),
            ]);            
            if ($user){
                if ($edu == Education::SCHOOL) {
                    $user->class = $request->class;
                    $user->year_of_passing = null;
                } else {
                    $user->year_of_passing = $request->year_of_passing;
                    $user->class = null;
                }
                $user->save();

                event(new Registered($user));

                DiscordHelper::newRegistration(User::find($user->id));

                Alert::success('Success', 'We will keep you updated and help you in your journey towards success :)');
                return redirect()->back();
            } else {
                Alert::error('Error', 'Something went wrong. Please try again :(');
                return redirect()->back();
            }
        } else {
            Alert::error('Slow down tiger', 'You have already shown interest in our noble quest to revolutionalise the world. We will keep you updated and help you in your journey towards success :)');
            return redirect()->back();
        }
    }

    public function register_inst(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'inst_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255,unique:institutes',
            'phone' => 'required|numeric|digits:10|unique:institutes',
            //'city' => ['required', 'in:'.implode(',', City::all()->pluck('id')->toArray())],
            'locality' => ['required', 'in:'.implode(',', Locality::all()->pluck('id')->toArray())],
            'password' => 'required|string|min:8',
            'address' => 'required|string|max:255',
        ]);

        $inst_exists = Institutes::where('email', $request->email)->first();
        if ($inst_exists){
            Alert::error('Slow down tiger', 'You have already registered as our comrade :)');
            return redirect()->back()->withInput();
        }

        $inst = Institutes::create([
            'name' => $request->inst_name,
            'city_id' => $this->city(),
            'locality_id' => $request->locality,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => AccountStatus::UNVERIFIED,
            'address' => $request->address,
        ]);

        $user_exists = User::where('phone', $request->phone)->first();
        if (!$user_exists){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password),
                'role' => UserRole::INSTITUTE,
                'city' => $this->city(),
                'locality' => $request->locality,
                'institute_id' => $inst->id,
                'account_status' => AccountStatus::UNVERIFIED,
                'admin_remarks' => 'Part of institute ' . $inst->name,
            ]);
        } else {
            $user = $user_exists;
            $user->institute_id = $inst->id;
            $user->admin_remarks = 'Part of institute ' . $inst->name;
            $user->save();
        }

        if ($user->account_status == AccountStatus::UNVERIFIED){
            SendAccountVerificationMail::dispatch($user);
        }

        DiscordHelper::newInstRegistration($inst, User::find($user->id));

        Alert::success('Success', 'Welcome aboard comrade :) Go to your dashboard after logging in to complete your registration.');
        return redirect()->route('institute.signin');
        
    }

    public static function login_inst(Request $request)
    {
        $request->validate([
            'email' => 'required|email|in:user',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            redirect()->route('institute.dashboard.index');
        }

        Alert::error('Oops!', 'Incorrect email or password. Please try again :(');
        return redirect()->back();        
    }
}
