<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Mail;
Use Alert;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }

    public function show_form($token)
    {
        $rec = DB::table('password_resets')->where('token', $token)->first();
        if ($rec == null) {
            Alert::error('Oops!', 'Something went wrong :(');
            return redirect()->route('frontend.index');
        }
        $email = $rec->email;
        return view('auth.reset-password', [
            'email' => $email,
            'token' => $token
        ]);
    }

    public function send_reset_link(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $url = route('services.password.reset', $token);

        Mail::to($request->email)->send(new PasswordResetMail($url));

        Alert::success('Reset Password Link Sent!', 'Please check your email')->persistent('Close');

        return redirect()->route('frontend.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6|same:password',
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $request->email, 
                              'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            Alert::error('Invalid token!', 'Please try again')->persistent('Close');
            return redirect()->route('frontend.signin');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => bcrypt($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        Alert::success('Password Changed!', 'Please login again')->persistent('Close');
        return redirect()->route('frontend.index');
    }
}
