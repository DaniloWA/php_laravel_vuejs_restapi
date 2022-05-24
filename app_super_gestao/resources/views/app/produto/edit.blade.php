@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Editar Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;" >
                <form action=" {{ route('produto.update', ['produto' => $produto->id]) }} " method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text"  name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first() : ''}}
                    <input type="text" value="{{ $produto->descricao ?? old('descricao') }}" name="descricao" placeholder="Descrição" class="borda-preta">
                    {{ $errors->has('descricao') ? $errors->first() : ''}}
                    <input type="text" value="{{ $produto->peso ??  old('peso') }}" name="peso" placeholder="Peso" class="borda-preta">
                    {{ $errors->has('peso') ? $errors->first() : ''}}

                   <select name="unidade_id">
                       <option value="">-- Selecione a Unidade de Medida --</option>
                       @foreach($unidades as $unidade)
                            <option value="{{$unidade->id}}" {{($produto->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : '')}} >{{$unidade->descicao}}</option>
                       @endforeach

                   </select>
                   {{ $errors->has('unidade_id') ? $errors->first() : ''}}

                    <button type="submit" class="borda-preta">Editar</button>
                </form>
            </div>
        </div>

    </div>

@endsection