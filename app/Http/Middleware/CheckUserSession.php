<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        if (!$request->session()->has('_auth_session')) {
            // user value cannot be found in session
            return redirect('/log-in');
            //echo "tttttooo";
        }

        return $next($request);
    }
}
