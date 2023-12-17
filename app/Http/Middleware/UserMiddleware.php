<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && ($request->path() == 'login' || $request->path() == 'register')) {
            return redirect('/dashboard');
        }

        if (!Auth::check() && $request->path() != 'login' && $request->path() != 'register') {
            return redirect('/login');
        }

        return $next($request);
    }
}
