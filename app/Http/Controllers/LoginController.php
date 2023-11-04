<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Enums\UserRole;
use App\Enums\Education;
use App\Models\Locality;
use App\Models\Institutes;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use App\Enums\AccountStatus;
use App\Rules\ReCaptchaRule;
use Illuminate\Http\Request;
use App\Helpers\DiscordHelper;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use RealRashid\SweetAlert\Facades\Alert;
use App\Jobs\SendAccountVerificationMail;


class LoginController extends Controller
{

    private function city()
    {
        return City::all();
    }

    private function locality()
    {
        return Locality::all();
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'redirect' => 'nullable|url',
            /* 'recaptcha' => ['required', new ReCaptchaRule] */
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {

            if (Auth::user()->status == AccountStatus::UNVERIFIED) {
                if (Auth::user()->role == UserRole::STUDENT){
                    Auth::logout();
                    return redirect()->route('institute.index');
                }
                Alert::html('Oops!', 'Your account is not verified yet. Please check your email for a verification link or click below to generate one :)<br><br><center><button onclick="window.location.href=\'/resend/verify\'" style="padding: 1.25rem; background-color: rgb(48, 86, 211); color: #fff; border-radius: 10px;">Resend verification mail</button></center>', 'error');
                return redirect()->back()->withInput();
            }
            
            Alert::success('Success!', 'Logged in successfully :D');
            $request->session()->regenerate();
            if ($request->redirect != null){
                return redirect()->to($request->redirect);
            }
            return redirect()->route('frontend.index');
        }
        
        Alert::error('Oops!', 'Incorrect email or password. Please try again :(');
        return redirect()->back()->withInput();     
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('frontend.signin');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            /* 'recaptcha' => [new ReCaptchaRule], */
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
            //'recaptcha_token' => env('APP_ENV') == 'local' ? '' : [new ReCaptchaRule($request->recaptcha_token)],
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'education' => 'required|string|min:2',
            'class' => 'required_if:education,==,school',
            'year_of_passing' => 'required_if:education,==,ug|required_if:education,==,pg',
            'password' => 'required|string',
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
                'city' => City::first()->id,
                'password' => bcrypt($request->password),
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
                Auth::login($user);
                Alert::success('Success', 'Welcome to Gradify :)');
                return redirect()->back();
            } else {
                Alert::error('Error', 'Something went wrong. Please try again :(');
                return redirect()->back();
            }
        } else {
            Alert::error('Oops!', 'An account already exists with that phone number');
            return redirect()->back();
        }
    }

}
