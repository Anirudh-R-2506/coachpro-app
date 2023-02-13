<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Enums\UserRole;
use Alert;
use App\Models\Institutes;
use App\Enums\AccountStatus;

class InstituteAuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('institute.signin');
        }

        if (auth()->user()->role != UserRole::INSTITUTE) {
            Alert::error('Oops!', 'You are not authorized to access this page.');
            return redirect()->route('institute.index');
        }

        if (auth()->user()->account_status != AccountStatus::VERIFIED){
            Alert::html('Oops!', 'Your account is not verified yet. Please check your email for a verification link or click below to generate one :)<br><br><center><button onclick="window.location.href=\'/resend/verify\'" style="padding: 1.25rem; background-color: rgb(48, 86, 211); color: #fff; border-radius: 10px;">Resend verification mail</button></center>', 'error');
            return redirect()->route('institute.index');
        }

        if (Institutes::find(auth()->user()->institute_id)->status != AccountStatus::VERIFIED){
            Alert::html('Oops!', 'Your institute is not verified yet. Please contact us to verify your institute.', 'error');
            return redirect()->route('institute.index');
        }

        return $next($request);
    }
}
