<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    protected $table = 'produtos_detalhes'; // mesmo nome da tabela no banco de dados!

    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura','unidade_id'];

    public function produto() {
        return $this->belongsTo('App\Item', 'produto_id', 'id');
    }
}
