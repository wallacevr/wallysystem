<?php

use Illuminate\Support\Facades\Route;

use App\http\Controllers\ProdutoController;
use App\http\Controllers\FornecedorController;
use App\http\Controllers\ProdutoVendaController;
use App\http\Controllers\PedidoController;
use App\http\Controllers\PedidoVendaController;
use App\http\Controllers\UserController;
use App\Http\Controllers\HomeController;

//controllers p/ manipulamos a lógica de tratamento das requisições recebendo os dados do model e transmitindo-os p/ view

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/cadastro', function () {
    return view('auth.cadEmpresa');
});

//Registrando as Rotas e os Verbos HTTP Padrões dos Endpoints

Route::resource('/fornecedor', FornecedorController::class);
Route::resource('/pedidoVenda', PedidoVendaController::class);
Route::resource('/pedido', PedidoController::class);
Route::resource('/produto', ProdutoController::class);

Route::resource('/home', HomeController::class);



Route::group(['middleware' => 'auth', 'middleware' => 'admin'], function(){
        //Usuario
        Route::prefix('usuario')->group(function(){
            Route::get('/', 'App\Http\Controllers\UserController@index')->name('usuario.index');
            Route::get('/cadastro', 'App\Http\Controllers\UserController@create')->name('usuario.create');
            Route::post('/salvar', 'App\Http\Controllers\UserController@store')->name('usuarios.store');
            Route::get('/alterar/{id}', 'App\Http\Controllers\UserController@edit')->name('usuarios.edit');
            Route::put('/alterar/{user}', 'App\Http\Controllers\UserController@update')->name('usuarios.update');
            Route::delete('/deletar/{user}', 'App\Http\Controllers\UserController@destroy')->name('usuarios.destroy');
        });
        Route::prefix('produtoVenda')->group(function(){
            Route::get('/', 'App\Http\Controllers\ProdutoVendaController@index')->name('produtoVenda.index');
            Route::get('/cadastro', 'App\Http\Controllers\ProdutoVendaController@create')->name('produtoVenda.create');
            Route::post('/salvar', 'App\Http\Controllers\ProdutoVendaController@store')->name('produtoVenda.store');
            Route::get('/alterar/{id}', 'App\Http\Controllers\ProdutoVendaController@edit')->name('produtoVenda.edit');
            Route::put('/alterar/{produtoVenda}', 'App\Http\Controllers\ProdutoVendaController@update')->name('produtoVenda.update');
            Route::delete('/deletar/{produtoVenda}', 'App\Http\Controllers\ProdutoVendaController@destroy')->name('produtoVenda.destroy');
        });
});




//Registrando as Rotas Fornecedores e os Verbos HTTP dos Endpoints manualmente

//Route::get('/fornecedores', 'App\Http\Controllers\FornecedorController@index')->name('fornecedor');
//Route::get('/fornecedores/create', 'App\Http\Controllers\FornecedorController@create')->name('fornecedorCreate');
//Route::post('/fornecedores/store', 'App\Http\Controllers\FornecedorController@store')->name('fornecedorStore');
//Route::get('/fornecedores/edit', 'App\Http\Controllers\FornecedorController@edit')->name('fornecedorEdit');
//Route::put('/fornecedores/update', 'App\Http\Controllers\FornecedorController@update')->name('fornecedorUpdate');
//Route::delete('/fornecedores/destroy', 'App\Http\Controllers\FornecedorController@destroy')->name('fornecedorDestroy');


Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
//Route::get('/home', 'HomeController@index')->name('home');
