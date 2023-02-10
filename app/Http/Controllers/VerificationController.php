<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\UserVerify;
use App\Models\User;
use App\Jobs\SendAccountVerificationMail;
use Alert;
use App\Enums\AccountStatus;

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
        $verify = UserVerify::where('token', $token)->first();

        if ($verify){
            if (!auth()->check()){
                Alert::error('Oops!', 'You are not logged in :(');
                return redirect()->route('frontend.signin');
            }
            else{
                $user = auth()->user();
                if ($user->id == $verify->user_id){
                    if ($user->account_status == AccountStatus::UNVERIFIED){
                        $user->account_status = AccountStatus::VERIFIED;
                        $user->save();
                        Alert::success('Success!', 'Your email has been verified :D');
                        return redirect()->route('frontend.index');
                    }
                    else{
                        Alert::success('Success!', 'Your email has already been verified :D');
                        return redirect()->route('frontend.index');
                    }
                }
                else{
                    Alert::error('Oops!', 'Your verification token is invalid :(');
                    return redirect()->route('frontend.index');
                }
            }
        }
        else{
            Alert::error('Oops!', 'Your verification token is invalid :(');
            return redirect()->route('frontend.index');
        }
    }

    public function resend(Request $request)
    {

        $user = auth()->user();

        $this->send_verification_link($user);

    }    
}