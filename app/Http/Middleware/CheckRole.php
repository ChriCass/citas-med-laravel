<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $rol)
    {
        $user = $request->user();
        if (! $user || ! $user->tieneRol($rol)) {
            abort(403, 'Acceso no autorizado.');
        }
        return $next($request);
    }
}
