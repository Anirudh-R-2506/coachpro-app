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

class LoginController extends Controller
{

    protected $city = "Bangalore";

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $response = [
                'status' => 'success',
                'message' => 'Login successful',                
            ];
            return response()->json($response, 200);
        }
    }

    public function logout()
    {
        Auth::logout();

        return response()->json([
            'status' => 'success',
            'message' => 'Logout successful',
        ], 200);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        $response = [
            'status' => 'success',
            'message' => 'Login successful',                
        ];
        return response()->json($response, 200);
    }

    public function register_cs(Request $request)
    {
        $request->validate([
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
                'status' => AccountStatus::UNVERIFIED,
                'role' => UserRole::STUDENT,
                'city' => $this->city,
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

                DiscordHelper::newRegistration($user);

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
}
