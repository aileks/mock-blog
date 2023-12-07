<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()?->username == 'liyah') {
            abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
