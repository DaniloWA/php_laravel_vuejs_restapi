<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoreController extends Controller
{
    public function index(){
        $fornecedores = [
            0 => [
                'nome'=> 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '00.0000.000/000-00',
            ],
            1 => [
                'nome'=> 'Fornecedor 1',
                'status' => 'S'
            ],
    ];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
