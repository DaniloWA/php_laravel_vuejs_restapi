<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//fornecedors Eloquent apenas acrescenta o S no final e pode dar conflitos.
//fornecedores

class Fornecedor extends Model
{
    use SoftDeletes;
    // Atributo table vai sempre sobrepor a nomeação automatica do eloquent
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function produtos () {
        return $this->hasMany('App\Item','fornecedor_id','id');
       //return $this->hasMany('App\Item'); se os nomes forem padrões formados pelo laravel não precisa por
    }
}

