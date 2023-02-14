<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // admin role == 1
            // user role == 0
            if (Auth::user()->role == '1') {
                return $next($request);
            } else {
                return redirect()->route('auth.adminlogin')->with('message', 'Access Denied as you are not Admin!');
            }
        } else {
            return redirect()->route('auth.adminlogin')->with('message', 'Login to access the website info');
        }
        return $next($request);
    }
}
