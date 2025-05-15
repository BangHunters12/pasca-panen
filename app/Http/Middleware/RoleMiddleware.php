<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::guard('petani')->check() && Auth::guard('petani')->user()->role === $role) {
            return $next($request);
        }

        abort(403, 'Akses ditolak.');
    }
}
