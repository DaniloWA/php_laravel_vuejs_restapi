<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\logAcessoMiddleware;

class SobreNosController extends Controller
{
    //Adicionando um Middleware diretamentem em um constroller invez de por na rota 
    public function __construct(){
        $this->middleware(logAcessoMiddleware::class);
    }
    public function sobre(){
        return view('site.sobre-nos');
    }
}
