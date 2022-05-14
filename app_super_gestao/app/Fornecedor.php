<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//fornecedors Eloquent apenas acrescenta o S no final e pode dar conflitos.
//fornecedores

class Fornecedor extends Model
{
    // Atributo table vai sempre sobrepor a nomeação automatica do eloquent
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}
