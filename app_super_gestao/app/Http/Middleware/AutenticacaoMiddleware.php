<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;

class AutenticacaoMiddleware
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
        //verifica se o  usuário possui acesso a rota
        if(true){
            return $next($request);
        } else {
            return Response('Acesso negado! Rota existe autenticação!');
        }
    }
}
