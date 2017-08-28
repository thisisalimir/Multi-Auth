<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class RedirectIfAdminAuthenticated
 * @package App\Http\Middleware
 */
class RedirectIfAdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //we also Check User Login
        if (Auth::guard()->check()) {
            return redirect('/home');
        }
        //Check Admin
        if (Auth::guard('web_admin')->check()) {
            return redirect('/admin_home');
        }
        return $next($request);
    }
}
