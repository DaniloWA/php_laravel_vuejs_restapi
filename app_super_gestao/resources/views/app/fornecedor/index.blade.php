<h3>Fornecedor</h3>

{{ 'Texto de teste'}}

<?= 'Texto de teste' ?>

{{-- Fica o comentário que será descartado pelo interpretador do blade --}}

@php

    // Para comentários de uma linha
    /*
        Para comentários de multiplas linhas!

         echo 'Texto de teste';

    if() {
        
    } elseif ( ) {
        
    } else {

    }

    {{ $fornecedores }} não suporta variavel do tipo array

    @dd($fornecedores)

    @if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
    @elseif(count($fornecedores) > 10)
        <h3>Existem vários fornecedores cadastrados</h3>
    @else
        <h3>Ainda não existem fornecedores cadastrados</h3>
    @endif

    Enquanto o IF executa se o retorno for true
    o @unless executa se o retorno for false


    @if( !($fornecedores[0]['status'] == 'S') )
    Fornecedor inativo
@endif
<br/>
@unless($fornecedores[0]['status'] == 'S') <!---Ele executa se o retorno da condiçã for false diferente do IF que é quando true -->
    Fornecedor inativo
@endunless
<br/>


    if(isset($variavel)) {} \\ retorna true se a variavel estiver definida/existe

    if(empty($variavel)) {} \\ retorna true se a variavel estiver vazia

    variaveis vazias no PHP
    - ''
    - 0
    - 0.0
    - '0'
    - null
    - flase
    - array()
    - $var declarada mas sem valor

    */



    
@endphp
<br/>
<br/>
@isset($fornecedores)
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br/>
    Status: {{ $fornecedores[0]['status'] }}
    <br/>
    @isset($fornecedores[0]['cnpj'])
        CNPJ: {{ $fornecedores[0]['cnpj'] }}
        @empty($fornecedores[0]['cnpj'])
            -- Vazio
        @endempty
    @endisset
@endisset