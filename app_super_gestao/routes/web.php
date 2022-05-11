<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*  sem controoler

Route::get('/', function () {
    return 'Olá, Seja bem vindo';
});

Route::get('/sobre-nos', function () {
    return 'Sobre-nós';
});

Route::get('/contato', function () {
    return 'contato';
});

Abaixo com controller */

Route::get('/', 'PrincipalController@principal');
Route::get('/sobre-nos', 'SobreNosController@sobre');
Route::get('/contato', 'ContatoController@contato');


Route::get('/login', function(){return 'Login';});

route::prefix('/app')->group(function(){
    Route::get('/cliente', function(){return 'cliente';});
    Route::get('/fornecedores', function(){return 'fornecedores';});
    Route::get('/produtos', function(){return 'produtos';});
});






/*      

// nome, categoria, assunto, mensagem
                             // Boa praticar usar o mesmo nome! mas pra mostrar que oque importa é a ordem
                             // interrogação no final do parametro faz ele ficar opcional!
Route::get(
    '/contato/{nome}/{categoria_id}', 
function(
        string $nome = "desconhecido",
        int $categoria_id  = 1 // - 'Informação'
 ) {
    echo "Estamos aqui: $nome - $categoria_id";
    
})->where('categoria_id','[0-9]+')->where('nome', '[A-Za-z]+'); // parametros com expressão regular






Route::get($uri, $callback);
            url e função que vai ser executada nessa url

    Verbo http

    get
    post
    put
    patch
    delete
    options

*/