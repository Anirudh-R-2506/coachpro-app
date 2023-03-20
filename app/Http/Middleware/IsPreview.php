<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsPreview
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
        if (! $request->is('preview/*') && auth()->check() && auth()->user()->email == env('PREVIEW_EMAIL')) {
            return redirect()->route('frontend.index');
        }
        return $next($request);
    }
}
