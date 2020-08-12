<?php

namespace App\Http\Middleware;

use Closure;

class Persona_Reclamante_Middleware
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
        if (auth()->User()->rol_id == 1 || auth()->User()->rol_id ==  2 || auth()->User()->rol_id == 3) {
            return $next($request);
        }else{
            return redirect('/');
        }
    }
}
