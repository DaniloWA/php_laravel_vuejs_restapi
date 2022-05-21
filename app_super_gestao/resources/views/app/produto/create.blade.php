@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Adicionar Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;" >
                <form action="{" method="POST">
                    @csrf
                    <input type="text" value="" name="nome" placeholder="Nome" class="borda-preta">
                   

                    <input type="text" value="" name="descricao" placeholder="site" class="borda-preta">


                    <input type="text" value="" name="peso" placeholder="uf" class="borda-preta">


                   <select name="unidade_id">
                       <option value="">-- Selecione a Unidade de Medida --</option>
                   </select>

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>

    </div>

@endsection