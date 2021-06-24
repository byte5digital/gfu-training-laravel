<?php

namespace App\Http\Middleware;

use Closure;

class validateApiToken
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
        if ($request->header('Api-Key') == config('app.API_KEY')) {
            return $next($request);
        } else {
            return response()->json('You shall not pass', 401);
        }
    }
}
