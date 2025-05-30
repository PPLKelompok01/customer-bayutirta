<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class KonsultasiAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated with the konsultasi guard
        if (!Auth::guard('konsultasi')->check()) {
            return redirect('/konsultasi/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
