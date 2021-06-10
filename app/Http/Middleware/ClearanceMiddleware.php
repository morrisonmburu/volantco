<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClearanceMiddleware
{
    if (Auth::guard('admin')->hasPermissionTo('Administer roles & permissions')) //If user has this //permission
    {
            return $next($request);
        }

        if ($request->is('posts/create'))//If user is creating a post
         {
            if (!Auth::guard('admin')->hasPermissionTo('Create Post'))
         {
                abort('401');
            } 
         else {
                return $next($request);
            }
        }

        if ($request->is('posts/*/edit')) //If user is editing a post
         {
            if (!Auth::guard('admin')->hasPermissionTo('Edit Post')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) //If user is deleting a post
         {
            if (!Auth::guard('admin')->hasPermissionTo('Delete Post')) {
                abort('401');
            } 
         else 
         {
                return $next($request);
            }
        }

        return $next($request);
    }
}
