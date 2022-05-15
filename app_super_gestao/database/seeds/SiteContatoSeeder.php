<?php

use App\SiteContato;
use Illuminate\Database\Seeder;


class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(SiteContato::class, 500)->create();

        /*
        $contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(11) 9999-7777';
        $contato->email = 'contato@sg.com.br';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Seja Bem vindo ao App super gestão';
        $contato->save();
         */
       
    }
}
