@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Editar Detalhes do Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="#">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <h4>Produto</h4>
            <div>Nome: {{ $produtos_detalhe->produto->nome }}</div>
            <br>
            <div>Descrição: {{ $produtos_detalhe->produto->descricao }}</div>

            <div style="width: 30%; margin-left: auto; margin-right: auto;" >
                @component('app.produto_detalhe._components.form_create_edit',['produtos_detalhe' => $produtos_detalhe, 'unidades' => $unidades])
                    
                @endcomponent
            </div>
        </div>

    </div>

@endsection