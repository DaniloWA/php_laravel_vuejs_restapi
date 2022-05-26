@extends('app.layouts.basico')

@section('titulo', 'Pedidos')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Pedidos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;" >
               <!--  $produtos->toJson()  Lazy Loading só vai ter as informações apos a chamada do metodo no caso produtosDetalhes dentro da tabela -->
                <table border="1" width="100%" >
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{$pedido->id}}" method="post" action="{{ route('pedido.destroy', ['pedido'=>$pedido->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <!--<button type="submit">Excluir</button>-->
                                        <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Exluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- {{ $pedidos->toJson() }} -->
                {{ $pedidos->appends($request)->links() }}
                <!--
                {{ $pedidos->count() }} - Total de registros por página
                <br>
                {{ $pedidos->total() }} - Total de registros da consulta
                <br>
                {{ $pedidos->firstItem() }} - Número do primeiro Registro da pagina
                <br>
                {{ $pedidos->lastItem() }} - Número do ultimo Registro da pagina
                -->
                <br>
                Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }} (de {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})
            </div>
        </div>

    </div>

@endsection