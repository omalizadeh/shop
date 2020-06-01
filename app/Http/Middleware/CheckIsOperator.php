<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsOperator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->hasAnyRoles(['admin', 'operator'])) {
            return $next($request);
        } else {
            abort(404);
        }
    }
}
