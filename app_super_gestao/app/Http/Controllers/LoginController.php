<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){

        // get() forma pratica de acessar atributos de uma requisição
        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuario e ou senha não existe!';
        };

        if($request->get('erro') == 2){
            $erro = 'Necessario Realizar Login para ter acesso a pagina!!';
        };
        
        return view('site.login', ['titulo' => 'Login','erro' => $erro]);

    }

    public function autenticar(Request $request){
         //Regras de validação
         $regras = [
             'usuario' => 'email',
             'senha' => 'required'
         ];

         //Mensagens de feedback de validação
         $feedback = [
             'usuario.email' => 'O campo usuário (e-meial) é obrigatório',
             'senha.required' => 'O campo senha é obrigatório'
         ];

         $request->validate($regras, $feedback);

         //Recuperamos os parametros do formulario
         $email =  $request->get('usuario');
         $password = $request->get('senha');

         //echo "Usuario: $email  | Senha: $password <br>";

         //iniciar o MOdel User
         $user = new User();

         //usando metodo get() pra retornar uma coletion com base na consulta
         $usuario = $user->where('email', $email)
                        ->where('password', $password)
                        ->get()
                        ->first();
         
         if(isset($usuario->name)){
           
            //iniciando sessao no php
            session_start();
            //Apos iniciar sessão é possivel acessar a super global session e definir indices e valores 
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.clientes');
         } else {
            return redirect()->route('site.login', ['erro' => 1]);
         }

    }
    
}
