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
    */



    
@endphp

@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif