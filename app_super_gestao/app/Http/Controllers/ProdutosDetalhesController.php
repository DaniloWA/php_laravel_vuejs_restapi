<?php

namespace App\Http\Controllers;

use App\ProdutosDetalhe;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutosDetalhesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
         
        return view('app.produto_detalhe.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProdutosDetalhe::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App/ProdutoDetalhe $produtos_detalhe
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutosDetalhe $produtos_detalhe)
    {   
        
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit', ['produtos_detalhe' => $produtos_detalhe, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App/ProdutoDetalhe $produtos_detalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutosDetalhe $produtos_detalhe)
    {
        $produtos_detalhe->update($request->all());
        echo 'Atualização Sucesso!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
