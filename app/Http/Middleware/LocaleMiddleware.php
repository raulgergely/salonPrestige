<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class LocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifică dacă există un cookie 'locale'
        $locale = $request->cookie('locale');

        if (!$locale) {
            // Dacă nu există cookie, determină limba din browser și setează cookie-ul
            $browserLocale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
            $locale = in_array($browserLocale, ['ro', 'en']) ? $browserLocale : 'ro';

            // Setează cookie-ul pentru 30 de zile
            cookie()->queue('locale', $locale, 60 * 24 * 30); // 30 zile
        }

        // Setează limba aplicației
        App::setLocale($locale);

        return $next($request);
    }
}
