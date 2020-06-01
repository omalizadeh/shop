<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAdmin
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->hasRole('admin')) {
            return $next($request);
        } else {
            abort(404);
        }
    }
}
