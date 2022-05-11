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

Route::get('/', function () {
    return 'Olá, Seja bem vindo';
});

Route::get('/sobre-nos', function () {
    return 'Sobre-nós';
});

Route::get('/contato', function () {
    return 'contato';
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