<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class testMiddleware
{
   /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {
        //cosas a tener en cuenta cron que actualice en cero y carbon now atras
        //si ya se vencio la prueba gratis
        //si compra plan no olvidar poner en cero y carbon now atras la prueba gratis
        //si no  tiene prueba gratis ni plan pss redirigir a comprar
        //tener en cuenta asi sea prueba gratis
        //cargar el nombre del plan al cual tiene acceso
        //asi bloquearemos funciones y sabes cual plan tiene
        //posible mejora cuando se pase a mercadopago
        //no olvidar otro cron que actualice la suscription a diario 
        if(\Auth::user()->free == 0 && \Auth::user()->finish_free < \Carbon\Carbon::now() ){
             if(\Auth::user()->subscribed()){
                return $next($request);
               }
            return redirect()->to('suscription/plan');
        }else{
                return $next($request);
        }
    }
}
