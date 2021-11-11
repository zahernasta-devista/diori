<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class FirstTimeLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->first_time_login == 1)
        {
            Password::sendResetLink(['email'=>Auth::user()->email]);
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/login')->withErrors('Check Your Email To Change Your Password,after that you can login!');


        }

        return $next($request);
    }
}
