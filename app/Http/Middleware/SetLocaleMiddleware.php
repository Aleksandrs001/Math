<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        // Start the session if it's not already started
        if (!$request->hasSession()) {
            $request->setLaravelSession(app('session')->driver());
        }

        // Check if the session has the 'locale' key
        if ($request->session()->has('locale')) {
            $locale = $request->session()->get('locale');
            App::setLocale($locale);
            // Add debugging statements
        }

        return $next($request);
    }

}

