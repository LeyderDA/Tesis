<?php

namespace App\Http\Middleware;

use Closure;

class Gestion_Middleware
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
        if (auth()->User()->rol_id == 3 || auth()->User()->rol_id == 4) {
            return $next($request);
        }else{
            return redirect('/');
        }
    }

}
