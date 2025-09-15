<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login untuk mengakses halaman admin.');
        }

        // Optional: Add role-based authentication
        // if (Auth::user()->role !== 'admin') {
        //     return redirect()->route('landing')->with('error', 'Anda tidak memiliki akses ke halaman admin.');
        // }

        return $next($request);
    }
}