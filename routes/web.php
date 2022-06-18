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

Route::get('pagamento', function () {
    return view('pagamentos.pagamento');
});

//Registrando as Rotas e os Verbos HTTP Padrões dos Endpoints

//Route::resource('/fornecedor', FornecedorController::class);

Route::resource('/pedido', PedidoController::class);
Route::resource('/produto', ProdutoController::class);





Route::group(['middleware' => 'auth', 'middleware' => 'admin'], function(){
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
        //Usuario
        Route::resource('/pedidoVenda', PedidoVendaController::class);
        Route::prefix('usuario')->group(function(){
            Route::get('/listar', 'App\Http\Controllers\UserController@index')->name('usuario.index');
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
        Route::prefix('cliente')->group(function(){
            Route::get('/listar', 'App\Http\Controllers\UserController@clienteindex')->name('cliente.index');
            Route::get('/cadastro', 'App\Http\Controllers\UserController@clientecreate')->name('cliente.create');
            Route::post('/salvar', 'App\Http\Controllers\UserController@clientesstore')->name('cliente.store');
            Route::get('/alterar/{id}', 'App\Http\Controllers\UserController@clienteedit')->name('cliente.edit');
            Route::put('/alterar/{user}', 'App\Http\Controllers\UserController@clienteupdate')->name('cliente.update');
            Route::delete('/deletar/{user}', 'App\Http\Controllers\UserController@clientedestroy')->name('cliente.destroy');
        });
        Route::prefix('fornecedor')->group(function(){
            Route::get('/', 'App\Http\Controllers\FornecedorController@index')->name('fornecedor.index');
            Route::get('/cadastro', 'App\Http\Controllers\FornecedorController@create')->name('fornecedor.create');
            Route::post('/salvar', 'App\Http\Controllers\FornecedorController@store')->name('fornecedor.store');
            Route::get('/alterar/{fornecedor}', 'App\Http\Controllers\FornecedorController@edit')->name('fornecedor.edit');
            Route::put('/alterar/{fornecedor}', 'App\Http\Controllers\FornecedorController@update')->name('fornecedor.update');
            Route::delete('/deletar/{fornecedor}', 'App\Http\Controllers\FornecedorController@estroy')->name('fornecedor.destroy');
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

Route::post('/Empresas/create', '\App\Http\Controllers\EmpresaController@store')->name('empresas.create');
//Route::get('/home', 'HomeController@index')->name('home');
