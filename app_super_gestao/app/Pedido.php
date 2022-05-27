<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function produtos() {
        //return $this->belongsToMany('App\Produto', 'pedidos_produtos');
        return $this->belongsToMany('App\Item', 'pedidos_produtos', 'pedido_id', 'produto_id');
        /*
            1 parametro
                Modelo do relacionamento NxN em relação o modelo que estamos implementando

            2 parametro
                é a atabela auxiliar que armazena os registros de relacionamento

            3 parametro
                Representa o nome da FK da tabela mapeada pelo modelo na tabela relacionamento
        
            4 parametro
                Representa o nome da FK da tabela mapeada pelo model utilizada no relacionamento que estamos implementando
        */
    }
}
