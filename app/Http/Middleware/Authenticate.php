<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
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
                return route('frontend.signin') . '?redirect=' . route('services.verification.verify', ['token' => $request->token]);
            return route('frontend.signin');
        }

        return $next($request);
    }
}
