<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!$request->user()->roles()->where('name', $role)->exists()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }

}
