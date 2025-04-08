<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if session has 'locale' and set the app locale
        if (Session::has('locale')) {
            app()->setLocale(Session::get('locale'));
        } else {
            // Set a default locale, e.g., 'en' or 'ro'
            app()->setLocale('ro');
        }

        return $next($request);
    }
}
