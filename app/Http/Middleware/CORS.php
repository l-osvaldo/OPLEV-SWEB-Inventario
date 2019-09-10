<?php namespace App\Http\Middleware;

use Illuminate\Support\Facades\Log;
use Closure;

class CORS {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        header('Access-Control-Allow-Origin: *');
       header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
       header('Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, Application');
       // hay que agregarle un die() aquí y subirlo para ver si esta entrando

       //die('cors');
       Log::notice("Valida");
       return $next($request);
    }

}