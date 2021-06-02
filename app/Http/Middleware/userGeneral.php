<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class userGeneral
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
        if(auth()->user()->role != "user_basic" )
        {
            abort(403, "¡No tienes acceso.");
        }
        return $next($request);
    }
}
