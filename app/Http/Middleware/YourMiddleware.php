<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\App;

class YourMiddleware
{
    public function handle($request, Closure $next)
    {
        // Start the session if it's not already started
        if (!session()->isStarted()) {
            session()->start();
        }

        // Check if the session has the 'locale' key
        if (session()->has('locale')) {
            App::setLocale(session('locale'));
        }

        return $next($request);
    }
}

