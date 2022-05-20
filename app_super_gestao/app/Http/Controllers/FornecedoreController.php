<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedoreController extends Controller
{
    public function index(){

        return view('app.fornecedor.index');
        /*
        $fornecedores = [
            0 => [
                'nome'=> 'Fornecedor 1',
                'status' => 'N',
                'ddd' => '11', // São Paulo (SP)
                'telefone' => '000000-0000' ,
                'cnpj' => '00.0000.000/000-00',
            ],
            1 => [
                'nome'=> 'Fornecedor 2',
                'status' => 'S',
                'ddd' => '85', // Fortaleza (CE)
                'telefone' => '000000-0000' ,
                'cnpj' => null,
            ],
            2 => [
                'nome'=> 'Fornecedor 3',
                'status' => 'S',
                'ddd' => '32', //Juiz de Fora (MG)
                'telefone' => '000000-0000' ,
                'cnpj' => null,
            ],
    ];

    operador ternário: condição = se verdade : se falso 
    $msg = isset($fornecedores[0]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';
    echo $msg;
    

        return view('app.fornecedor.index', compact('fornecedores'));
        */
    }

    public function listar(Request $request){

        $fornecedores = Fornecedor::where('nome', 'like' ,  '%'.$request->input('nome').'%')
        ->where('site', 'like' ,  '%'.$request->input('site').'%')
        ->where('uf', 'like' ,  '%'.$request->input('uf').'%')
        ->where('email', 'like' ,  '%'.$request->input('email').'%')->get();
        
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    
    public function adicionar(Request $request){
        $msg = '';

        //inclução
        if($request->input('_token') != '' && $request->input('id') == ''){
            //cadastro, validando
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 3 caracteres',
                'uf.min' => 'O campo uf deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo uf deve ter no máximo 2 caracteres',
                'email.email' => 'O campo email não foi preenchido corretamente'
            ];
        
            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            //redirect

            //dados vie

            $msg = "Cadastro realizado com Sucesso!";
             
        };

        //edição
        if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            //Editando  na base de dados
            $update = $fornecedor->update($request->all());
            if($update){
                $msg = 'Atualização Realizado com sucesso!';
            }else {
                $msg = 'Atualização apresentou problemas!';
            }
            
            return redirect()->route('app.fornecedor.adicionar', ['id' => $request->input('id'),'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = ''){
        //find() pesquisa o registro na base de dados pelo id
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }
}
