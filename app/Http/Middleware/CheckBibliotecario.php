<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBibliotecario
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->role == 'bibliotecario') {
            return $next($request);
        }

        return redirect('/browse')->with('error', 'No tienes permiso para acceder a esta página.');
    }
}
