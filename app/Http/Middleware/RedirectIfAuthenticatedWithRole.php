<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedWithRole
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role === 'cliente') {
                return redirect('/browse');
            } elseif ($user->role === 'bibliotecario') {
                return redirect('/dashboard');
            }
        }

        return $next($request);
    }
}
