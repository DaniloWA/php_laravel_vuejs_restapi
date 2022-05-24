@if(isset($produto_detalhe->id))
    <form action="{{ route('produto.update', ['produto' => $produto_detalhe->id])}}" method="POST">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('produtos-detalhe.store')}}" method="POST">
        @csrf
@endif
<input type="text"  name="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" placeholder="ID do produto" class="borda-preta">
{{ $errors->has('produto_id') ? $errors->first() : ''}}

<input type="text" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" name="comprimento" placeholder="Comprimento" class="borda-preta">
{{ $errors->has('comprimento') ? $errors->first() : ''}}

<input type="text" value="{{ $produto_detalhe->largura ??  old('largura') }}" name="largura" placeholder="Largura" class="borda-preta">
{{ $errors->has('largura') ? $errors->first() : ''}}

<input type="text" value="{{ $produto_detalhe->altura ??  old('altura') }}" name="altura" placeholder="Altura" class="borda-preta">
{{ $errors->has('altura') ? $errors->first() : ''}}

<select name="unidade_id">
    <option value="">-- Selecione a Unidade de Medida --</option>
    @foreach($unidades as $unidade)
        <option value="{{$unidade->id}}" {{($produto_detalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : '')}} >{{$unidade->descicao}}</option>
    @endforeach

    </select>
    {{ $errors->has('unidade_id') ? $errors->first() : ''}}

    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
