<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function produtosDetalhe() {
        return $this->hasOne('App\ProdutosDetalhe');
        //Produto tem 1 ProdutoDetalhe

        //Internamente o eloquente vai entender que ele deve procurar
        //um registro relacionado em produtos_detalhes (na BD) com base na FK (Foringkey) que é a produto_id nesse caso ou seja produtos (pk) -> id
    }
}
