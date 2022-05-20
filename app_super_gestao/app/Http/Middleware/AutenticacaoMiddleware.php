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
     */                                             // parametros passados no middleware parametros inifinitos
    public function handle($request, Closure $next, $metodo_autentificacao, $perfil)
    {
        
        session_start();
        
        if(isset($_SESSION['email']) && $_SESSION['email'] != ''){
            return $next($request);
        } else{
            return redirect()->route('site.login', ['erro' => 2]);
        }
        
        
        
        
        
        
        
        
        
        
        
        /*
        //verifica se o  usuário possui acesso a rota
        echo $metodo_autentificacao. ' - ' .$perfil. '<br>';

        if($metodo_autentificacao == 'padrao'){
            echo 'Verificar usarui e senha no banco de dados! <br>' .$perfil. '<br>';
        }

        if($metodo_autentificacao == 'ldap'){
            echo 'Verificar usarui e senha no AD! <br>' .$perfil. '<br>';
        }

        if($perfil == 'visitante'){
            echo 'Exibir apenas alguns recursos';
        } else {
            echo 'Carregar o perfil do banco de dados!';
        }

        if(true){
            return $next($request);
        } else {
            return Response('Acesso negado! Rota existe autenticação!');
        }
        */
        
    }
}
