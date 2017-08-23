<?php

namespace App\Http\Middleware;

use Cartalyst\Sentinel\Sentinel;
use Closure;

class AdminMiddleware
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
        // 1. User should authticated
        // 2. auth user should be admin

        if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'admin')
            return $next($request);
        return redirect()->route('login');
    }
}
