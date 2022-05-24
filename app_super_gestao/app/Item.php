<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos'; // mesmo nome da tabela no banco de dados!

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function produtosDetalhe() { //Expecificando o nome da coluna FK da tabela produtos em sequencia a primary key da tabela 
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id'); 
    }

    public function fornecedor() {  
        return $this->belongsTo('App\Fornecedor'); 
    }

    public function rel3() {  
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id'); 
    }
}
