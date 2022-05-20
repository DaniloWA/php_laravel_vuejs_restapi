@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="{{ route('site.login') }}"  method="post">
                    @csrf
                    <input type="text" name="usuario" value="{{ old('usuario') }}" placeholder="Usúario" class="borda-preta">
                    {{ $errors->has('usuario') ? $errors->first('usuario') : '' }}

                    <input type="text" name="senha" value="{{ old('senha') }}" placeholder="Senha" class="borda-preta">
                    {{ $errors->has('senha') ? $errors->first('senha') : '' }}

                    <input type="submit" class="borda-preta" value="Acessar">
                </form>
            </div>
        </div>  
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.jpg') }}">
        </div>
    </div>
@endsection