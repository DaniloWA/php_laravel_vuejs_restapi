<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('site.login', ['titulo' => 'Login']);
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

         echo "Usuario: $email  | Senha: $password <br>";

         //iniciar o MOdel User
         $user = new User();

         //usando metodo get() pra retornar uma coletion com base na consulta
         $usuario = $user->where('email', $email)
                        ->where('password', $password)
                        ->get()
                        ->first();
         
         if(isset($usuario->name)){
            echo 'Usuario existe!';
         } else {
            echo 'Usuario não existe!';
         }

    }
    
}
