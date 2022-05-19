<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\logAcessoMiddleware;

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

// ->middleware('log.acess')  usando Apelido de Middleware também pode ser usado nos constrolladores  

Route::get('/', 'PrincipalController@principal')
->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@sobre')
->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')
->name('site.contato');

Route::post('/contato', 'ContatoController@salvar')
->name('site.contato');

Route::get('/login', function(){return 'Login';})
->name('site.login');


route::prefix('/app')->group(function(){
    Route::middleware('autenticacao')
    ->get('/clientes', function(){return 'clientes';})
    ->name('app.clientes');

    Route::middleware('autenticacao')
    ->get('/fornecedores', 'FornecedoreController@index')
    ->name('app.fornecedores');
    
    Route::middleware('autenticacao')
    ->get('/produtos', function(){return 'produtos';})
    ->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}','TesteController@teste')->name('teste');


Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});




/*      




Route::get('/rota1', function() {
    echo 'Rota 1';
})->name('site.rota1');


//Route::redirect('/rota2','/rota1');


Route::get('/rota2', function() {
    return redirect()->route('site.rota1');
})->name('site.rota2');






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