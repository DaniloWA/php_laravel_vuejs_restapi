<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); //cm, mm, kg
            $table->string('descicao', 30);
            $table->timestamps();
        });

        //adicionar o relacionamento com a table produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        //adicionar o relacionamento com a table produto_detalhes
        Schema::table('produtos_detalhes', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        //Remover o relacionamento com a table produto_detalhes
        Schema::table('produtos_detalhes', function(Blueprint $table){
            //remover a fk (foreign)
            $table->dropForeign('produtos_detalhes_unidade_id_foreign'); //laravel inicia o nome da fk com o nome da tabela no caso produtos_detalhes [table]_[coluna]_foreign

            //remover a coluna unidade_id
            $table->dropColumn('unidade_id');
        });


        //Remover o relacionamento com a table produtos
        Schema::table('produtos', function(Blueprint $table){
            //remover a fk (foreign)
            $table->dropForeign('produtos_unidade_id_foreign'); //laravel inicia o nome da fk com o nome da tabela no caso produtos [table]_[coluna]_foreign

            //remover a coluna unidade_id
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
}
