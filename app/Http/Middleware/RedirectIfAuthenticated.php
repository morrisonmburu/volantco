<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        // dd($guard);

        switch ($guard) {
            case 'admin':
                // dd($guard);
                if (Auth::guard($guard)->check()) {
                    return redirect('/dashboard');
                }
                break;
      
            case 'web':
                if (Auth::guard($guard)->check()) {
                    return redirect('/volantuser/home');
                }
                break;

            case 'rider':
                if (Auth::guard($guard)->check()) {
                    return redirect('/rider-home');
                }
        }

        // if (Auth::guard($guard)->check()) {
        //     return redirect('/admin');
        // }
        return $next($request);
    }
}
