<?php

namespace App\Http\Middleware;

use Closure;

class DocenteMiddleware
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
        if (auth()->User()->rol_id == 4 || auth()->User()->rol_id == 1 || auth()->User()->rol_id == 2) {
            return $next($request);
        }else{
            return redirect('/');
        }
    }
}
