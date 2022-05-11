<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoreController extends Controller
{
    public function index(){
        $fornecedores = [ 0 => ['nome'=> 'Fornecedor 1', 'status' => 'N']
    ];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
