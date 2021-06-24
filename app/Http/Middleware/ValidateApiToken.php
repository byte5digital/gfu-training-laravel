<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->header('Api-Key') == config('app.API_KEY') || $request->api_key == config('app.API_KEY')) {
            return $next($request);
        }

        return response()->json('Validation failed.', 401);
    }
}
