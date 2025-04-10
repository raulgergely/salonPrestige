<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Session;

class LocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifică dacă există un set în sesiune pentru 'locale'
        $locale = session('locale');

        if (!$locale) {
            // Dacă nu există în sesiune, determină limba din browser
            $browserLocale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
            $locale = in_array($browserLocale, ['ro', 'en']) ? $browserLocale : 'ro';

            // Salvează limba în sesiune pentru următoarele cereri
            session(['locale' => $locale]);
        }

        // Setează limba aplicației
        App::setLocale($locale);

        return $next($request);
    }
}
