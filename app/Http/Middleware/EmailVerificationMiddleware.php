<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {

        // dd($request->post('email'));
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check if email is not verified
            if ($user->email_verified_at === null) {
                return redirect()->route('custom_verification');
            }
        }

        return $next($request);
    }
}