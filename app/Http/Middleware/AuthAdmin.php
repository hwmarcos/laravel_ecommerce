<?php

namespace CodeCommerce\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthAdmin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!isset(Auth::user()->is_admin) || Auth::user()->is_admin == 0) {
            return redirect()->guest('auth/login');
        }
        return $next($request);
    }

}
