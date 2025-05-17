<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    public function handle($request, Closure $next): Response
    {
        if (Auth::user()->usertype == "petani") {
            return $next($request);
        }

        return redirect()->back();
    }
}
