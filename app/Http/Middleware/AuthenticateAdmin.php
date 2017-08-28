<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthenticateAdmin
 * @package App\Http\Middleware
 */
class AuthenticateAdmin
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
        //if request does not come from login we redirect them to login page
        if (!Auth::guard('web_admin')->check()) {
            return redirect('/admin_login');
        }
        return $next($request);
    }
}
