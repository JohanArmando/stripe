<?php

namespace App\Http\Middleware;

use Closure;

class ChosenPlan
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
        //aqui segun el plan del usuario mostramos algunas funciones y otras no o procesamos algunas aciones y otras no
        return $next($request);
    }
}
