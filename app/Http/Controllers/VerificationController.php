<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\UserVerify;
use App\Models\User;
use App\Jobs\SendAccountVerificationMail;
use Alert;
use App\Enums\AccountStatus;
use App\Enums\UserRole;

class VerificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    private function send_verification_link($user)
    {

        SendAccountVerificationMail::dispatch($user);

    }

    public function verify($token)
    {        

        if (!auth()->check()){
            Alert::error('Oops!', 'You are not logged in :(');
            return redirect()->route('institute.signin');
        }

        $user = auth()->user();
        $verify = UserVerify::where('token', $token)->first();
        if ($verify){
            if ($verify->user_id == $user->id){
                $user->status = AccountStatus::ACTIVE;
                $user->save();
                $verify->delete();
                Alert::success('Success!', 'Your account has been verified :D');
                return redirect()->route(auth()->user()->role == UserRole::STUDENT ? 'frontend.index' : 'institute.index');
            }
            else{
                Alert::error('Oops!', 'Your verification token is invalid :(');
                return redirect()->route(auth()->user()->role == UserRole::STUDENT ? 'frontend.index' : 'institute.index');
            }            
        }
        else{
            if ($user->status == AccountStatus::ACTIVE){
                Alert::success('Success!', 'Your account has already been verified :D');
                return redirect()->route(auth()->user()->role == UserRole::STUDENT ? 'frontend.index' : 'institute.index');
            }
            Alert::error('Oops!', 'Your verification token is invalid :(');
            return redirect()->route(auth()->user()->role == UserRole::STUDENT ? 'frontend.index' : 'institute.index');
        }
    }

    public function resend()
    {
        $user = auth()->user();
        $this->send_verification_link($user);
        Alert::success('Success!', 'A new verification link has been sent to your email :D');
        return redirect()->route(auth()->user()->role == UserRole::STUDENT ? 'frontend.index' : 'institute.index');
    }    
}