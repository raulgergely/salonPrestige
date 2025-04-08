<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        $roles = explode('|', $role);

        if (auth()->check() && !in_array(auth()->user()->role, $roles)) {
            // Redirecționează utilizatorul către pagina de acces restricționat
            return redirect()->route('access.denied');
        }

        return $next($request);
    }
}
