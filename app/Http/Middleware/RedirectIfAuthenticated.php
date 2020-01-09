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
        switch($guard){
            case 'admin':
                // Check if the user already logged in
                // If true then redirect to user dashboard
                if (auth()->check()) {
                    return redirect('/');
                }
                elseif (Auth::guard($guard)->check()) {
                    return redirect('/admin');
                }
            break;

            default:
                // Check if the admin already logged in
                // If true then redirect to admin dashboard
                if (auth()->guard('admin')->check()) {
                    return redirect('/admin');
                }
                elseif (Auth::guard($guard)->check()) {
                    return redirect('/');
                }
            break;
        }
       
        return $next($request);
    }
}
