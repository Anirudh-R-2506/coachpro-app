<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Enums\AccountStatus;
use Alert;
use App\Jobs\SendAccountVerificationMail;

class Verified
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

        if (auth()->user() == null){
            return redirect()->route('frontend.signin');
        }

        if (auth()->user()->account_status != AccountStatus::VERIFIED) {
            Alert::error('Oops!', 'Your account is not verified yet. Please check your inbox or spam for the verification mail :)');
            SendAccountVerificationMail::dispatch(auth()->user());
            return redirect()->route('frontend.index');
        }

        return $next($request);
    }
}
