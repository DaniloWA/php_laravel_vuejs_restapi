<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        /*
            echo '<pre>';
            print_r($request->all());
            echo '</pre>';
            echo $request->input('nome');
            echo ' <br> ';
            echo $request->input('email');
        

        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());
                $contato->save();
        

        //preenche o objeto com um array associativo de maneira pratica mas precisa o atributop fillable 
        //$contato->fill($request->all());
        $contato = new SiteContato();

        //Cria diretamente um objeto baseado em um array associativo! des de que assim como fill a variavel protect $fillable esteja definida de modo a permitir o insert em massa das informações e assim não precisando do metodo ->save() como no fill()
        $contato->create($request->all());
        //$contato->save();
        //print_r($contato->getAttributes());
        */
        $motivo_contatos = MotivoContato::all();


        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
        
    }

    public function salvar(Request $request){   
         //:: executa o metodo create sem a necessidade de instanciar o objeto $contato = new SiteContato();   
        
        

        // Realizar a validação dos dados do formulário recebidos no request
        $request->validate([
            'nome' => 'required|min:3|max:16', 
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ]);
        // SiteContato::create($request->all());
    }
}

