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
// nome, categoria, assunto, mensagem
                             // Boa praticar usar o mesmo nome! mas pra mostrar que oque importa é a ordem
Route::get(
    '/contato/{nome}/{categoria}/{assunto}/{mensagem}', 
function(string $nome, string $categoria, string $assunto, string $mensagem) {
    echo "Estamos aqui: $nome - $categoria - $assunto - $mensagem";
    
});





/*      Route::get($uri, $callback);
            url e função que vai ser executada nessa url

    Verbo http

    get
    post
    put
    patch
    delete
    options

*/