<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class logAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     // função executada automaticamente
    public function handle($request, Closure $next)
    {
        //$request - manipular
        //$next envia a requisição pra frente 
        //return $next($request);
        //response - manipular antes de entregar pro browser
        //dd($request);

        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "$ip requisitou a rota $rota"]);

        $resposta = $next($request);

        $resposta->setStatusCode(201, 'O status da resposta e o texto da respsota foram modificados!!!');
        
        return $resposta;
        //return Response('Chegamos no middleware e finalizamos no proprio middleware');
    }
}
