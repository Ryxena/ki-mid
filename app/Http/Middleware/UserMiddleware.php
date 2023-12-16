<?php

namespace App\Http\Middleware;

use Helper;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $data = $request->all();
        $validationResult = Helper::validate($data);

        if ($validationResult !== true) {
            return response()->json(['error' => $validationResult], 401);
        }
        $accessTokenDate = Carbon::parse($data['access_token'])->format('Y-m-d');
        $currentDate = Carbon::now()->format('Y-m-d');
        if ($accessTokenDate !== $currentDate) {
            return response()->json(['error' => 'Access token expired'], 401);
        }
        
        return $next($request);
    }
}
