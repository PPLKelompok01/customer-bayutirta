<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        // Check if the request is for konsultasi routes
        if (str_starts_with($request->path(), 'konsultasi/')) {
            return '/konsultasi/login';
        }

        // Default redirect for other routes
        return '/login';
    }
}