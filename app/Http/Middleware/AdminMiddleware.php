<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user();
        if (!isset($user->role) || $user->role !== 'admin') {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Anda tidak memiliki akses admin.');
        }

        return $next($request);
    }
}