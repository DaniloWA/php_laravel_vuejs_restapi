<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'Fornecedor100.com.br';
        $fornecedor->uf= 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();

        // utilizando metodo create
        // precisa ser estabelecido no modelo quais atributos vão ser criados na variavel fillabel
        Fornecedor::create([
            'nome'=>'Fornecedor 200',
            'site'=> 'fornecedor200.com.br',
            'uf'=> 'RS',
            'email'=> 'contato@fornecedor200.com.br'
        ]);

        //insert query que não passa pelo tratamento do eloquent. é uma possibilidade mas não é recomendado.
        DB::table('fornecedores')->insert([
            'nome'=>'Fornecedor 300',
            'site'=> 'fornecedor300.com.br',
            'uf'=> 'SP',
            'email'=> 'contato@fornecedor300.com.br'
        ]);
    }
}
