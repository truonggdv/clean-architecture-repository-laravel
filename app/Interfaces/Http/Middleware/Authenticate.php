<?php

namespace App\Interfaces\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson() && \Str::is('admin*', request()->path())) {
            return route('admin.login');
        }
        if (!$request->expectsJson()) {
            return route('login');
        }
    }
}
