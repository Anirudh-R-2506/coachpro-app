<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!auth()->check()) {
            if (Route::is('services.verification.verify'))
                return route(Auth::user()->role == UserRole::STUDENT ? 'frontend.signin' : 'institute.signin') . '?redirect=' . route('services.verification.verify', ['token' => $request->token]);
            return redirect()->route(Auth::user()->role == UserRole::STUDENT ? 'frontend.signin' : 'institute.signin');
        }

        if (auth()->user()->account_status == AccountStatus::UNVERIFIED) {
            Alert::html('Oops!', 'Your account is not verified yet. Please check your email for a verification link or click below to generate one :)<br><br><center><button onclick="window.location.href=\'/resend/verify\'" style="padding: 1.25rem; background-color: rgb(48, 86, 211); color: #fff; border-radius: 10px;">Resend verification mail</button></center>', 'error');
            return redirect()->route(Auth::user()->role == UserRole::STUDENT ? 'frontend.signin' : 'institute.signin');
        }

        if (auth()->user()->account_status == AccountStatus::FLAGGED || auth()->user()->account_status == AccountStatus::BANNED) {
            Alert::html('Oops!', 'Your account is suspended. Please contact us to get your account reactivated.', 'error');
            Auth::logout();
            return redirect()->route(Auth::user()->role == UserRole::STUDENT ? 'frontend.signin' : 'institute.signin');
        }

        return $next($request);
    }
}
