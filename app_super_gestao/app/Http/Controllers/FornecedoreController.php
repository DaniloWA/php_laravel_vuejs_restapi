<?php

namespace App\Http\Controllers;

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

    public function listar(){
        return view('app.fornecedor.listar');
    }

    
    public function adicionar(){
        return view('app.fornecedor.adicionar');
    }
}
