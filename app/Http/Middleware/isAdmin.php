<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
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
//        if user is admin, process request
        if(auth()->user()->isAdmin()){
            return $next($request);
        }

        // case if does not pass, user will be sent to index page
        return redirect(route('articles.index'));
    }
}
