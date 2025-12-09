<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->user_type=='admin') { // Assuming 'is_admin' column in users table
                return $next($request);
            }

            // Redirect or return unauthorized response
            return redirect()->route('login')->with('error', 'Unauthorized access.');
    }
}
