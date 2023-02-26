<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\UserVerify;
use App\Models\User;
use App\Jobs\MobileVerificationSms;
use App\Jobs\SendAccountVerificationMail;
use Alert;
use App\Enums\AccountStatus;
use App\Enums\UserRole;
use App\Models\MobileVerify;

class VerificationController extends Controller
{


    private function get_login_link($token)
    {
        return route('institute.signin') . '?redirect=' . route('institute.services.verification.verify', ['token' => $token]);
    }

    private function send_verification_link($user)
    {

        SendAccountVerificationMail::dispatch($user);

    }

    private function send_mobile_verification_sms($user)
    {
        MobileVerificationSms::dispatch($user);
    }

    public function verify_mobile(Request $request)
    {
        $request->validate([
            'otp' => 'required',
        ]);

        $user = auth()->user();
        $verify = MobileVerify::where('user_id', $user->id)->first();
        if ($verify){
            if ($verify->otp == $request->otp){
                $user->account_status = AccountStatus::VERIFIED;
                $user->save();
                $verify->delete();
                Alert::success('Success!', 'Your mobile has been verified :D');
                return redirect()->back();
            }
            else{
                Alert::error('Oops!', 'Your verification OTP is invalid :(');
                return redirect()->back();
            }            
        }
        else{
            if ($user->account_status == AccountStatus::VERIFIED){
                Alert::success('Success!', 'Your mobile has already been verified :D');
                return redirect()->back();
            }
            else{
                Alert::error('Oops!', 'Your verification OTP is invalid :(');
                return redirect()->back();
            }
        }
    }

    public function resend_otp(Request $request)
    {
        $user = auth()->user();
        $this->send_mobile_verification_sms($user);
        Alert::success('Success!', 'OTP has been sent to your mobile number :D');
        return redirect()->back();
    }

    public function verify($token)
    {        
        
        if (!auth()->check()){
            Alert::error('Oops!', 'You are not logged in :(');
            return redirect()->to($this->get_login_link($token));
        }

        $user = auth()->user();
        $verify = UserVerify::where('token', $token)->first();
        if ($verify){
            if ($verify->user_id == $user->id){
                $user->account_status = AccountStatus::MOBILE_UNVERIFIED;
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
            if ($user->account_status == AccountStatus::MOBILE_UNVERIFIED){
                Alert::success('Success!', 'Your account has already been verified :D');
                return redirect()->route(auth()->user()->role == UserRole::STUDENT ? 'frontend.index' : 'institute.index');
            }
            Alert::error('Oops!', 'Your verification token is invalid :(');
            return redirect()->route(auth()->user()->role == UserRole::STUDENT ? 'frontend.index' : 'institute.index');
        }
    }

    public function resend()
    {

        if (!auth()->check()){
            Alert::error('Oops!', 'You are not logged in :(');
            return redirect()->route('institute.signin');
        }

        $user = auth()->user();
        $this->send_verification_link($user);
        Alert::success('Success!', 'A new verification link has been sent to your email :D');
        return redirect()->route(auth()->user()->role == UserRole::STUDENT ? 'frontend.index' : 'institute.index');
    }    
}