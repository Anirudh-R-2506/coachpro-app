<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Alert;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }

    public function show_form($token)
    {
        $rec = DB::table('password_resets')->where('token', $token)->first();
        $email = $rec->email;
        return view('auth.reset-password', compact('token', 'email'));
    }

    public function send_reset_email(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required|string|exists:password_resets,token'
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::to($request->email)->send(new ResetPassword($token));

        alert()->success('Reset Password Link Sent!', 'Please check your email')->persistent('Close');

        return route('frontend.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $request->email, 
                              'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            alert()->error('Invalid token!', 'Please try again')->persistent('Close');
            return route('frontend.signin');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        alert()->success('Password Changed!', 'Please login again')->persistent('Close');
        return route('frontend.signin');
    }
}
