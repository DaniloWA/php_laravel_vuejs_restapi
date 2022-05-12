<h3>Fornecedor</h3>

{{ 'Texto de teste'}}

<?= 'Texto de teste' ?>

{{-- Fica o comentário que será descartado pelo interpretador do blade 

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

    <!--foreach gera uma copia para afetar o valor original precisamos usar uma referencia!-->
    



    */
@endphp

<br/>
<br/>

forelse compinação do foreach e de um comando condicional para verificar se o array está vazio

          {{ $loop->count }} total de registros 
          $loop->first primeira iteraçãp
objeto {{ $loop->iteration }} está apenas disponivel no foreach e forelse isso porque no laço for e while declaramos a variavel de controle
--}}
<br>
@isset($fornecedores)

    @forelse($fornecedores as $indice => $fornecedor) 
        Interação atual: {{ $loop->iteration }}
        <br>
        Total de registros: {{ $loop->count }}
        <br>
        Fornecedor: {{ $fornecedor['nome'] }}
        <br/>
        Status: {{ $fornecedor['status'] }}
        <br/>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não foi preenchido' }}
        <br/>
        Telefone: {{ $fornecedor['ddd'] ?? '' }} {{ $fornecedor['telefone'] ?? '' }}
        <br>
        @if($loop->first)
            Primeira iteração do Loop
        @endif
        @if($loop->last)
            Ultima iteração do Loop
           
        @endif
        <hr>
    @empty
        Não existem fornecedores cadastrados!!!
    @endforelse

@endisset