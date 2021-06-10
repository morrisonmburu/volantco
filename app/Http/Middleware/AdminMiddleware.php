<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Admins;

class AdminMiddleware
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
        $user = Admins::all()->count();
        if (!($user == 1)) {
            if (!Auth::guard('admin')->user()->hasPermissionTo('Administer roles & permissions')) //If user does //not have this permission
        {
                abort('401');
            }
        }

        return $next($request);
    }
}
