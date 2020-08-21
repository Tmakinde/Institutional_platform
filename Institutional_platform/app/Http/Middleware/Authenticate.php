<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if (\Request::is('admin/*') || \Request::is('admin')){
                return route('admin-login');
            }
            return route('login');
        }
    }
}
