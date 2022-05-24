<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutosDetalhe extends Model
{
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura','unidade_id'];

    public function produto() {
        return $this->belongsTo('App\Produto');
    }
}
