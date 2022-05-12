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

    @isset($fornecedores[0]['cnpj'])
        CNPJ: {{ $fornecedores[0]['cnpj'] }}
        @empty($fornecedores[0]['cnpj'])
            -- Vazio
        @endempty
    @endisset

        <!-- operador ?? valor default
        $variavel testada não estiver definida (isset)
        ou
        $variavel testada possuir o valor null
        -->

        @switch($fornecedores[0]['ddd'])
        @case ('11')
            São Paulo - SP
            @break
        @case ('32')
            Juiz de Fora - MG     
            @break
        @case ('85')  
            Fortaleza - CE
            @break  
        @default
            Estado não identificado
        @endswitch

            @for($i = 0; isset($fornecedores[$i]); $i++)
        Fornecedor: {{ $fornecedores[$i]['nome'] }}
        <br/>
        Status: {{ $fornecedores[$i]['status'] }}
        <br/>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dado não foi preenchido' }}
        <br/>
        Telefone: {{ $fornecedores[$i]['ddd'] ?? '' }} {{ $fornecedores[$i]['telefone'] ?? '' }}
        <hr>
    @endfor
    */



    
@endphp
<br/>
<br/>
@isset($fornecedores)
    @php $i = 0 @endphp
    @while(isset($fornecedores[$i]))
        Fornecedor: {{ $fornecedores[$i]['nome'] }}
        <br/>
        Status: {{ $fornecedores[$i]['status'] }}
        <br/>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dado não foi preenchido' }}
        <br/>
        Telefone: {{ $fornecedores[$i]['ddd'] ?? '' }} {{ $fornecedores[$i]['telefone'] ?? '' }}
        <hr>
        @php $i++ @endphp    
    @endwhile
@endisset

