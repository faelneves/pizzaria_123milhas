<?php

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
    return view('menuView');
})->name('menuView');

Route::get('/menuView', function () {
    return view('menuView');
})->name('menuView');

//Rotas Clientes
Route::post('/createCliente', 'ClienteController@createCliente')->name('createCliente');
Route::get('/deleteCliente/{id}','ClienteController@deleteCliente')->name('deleteCliente');
Route::get('/showClientes', 'ClienteController@showClientes')->name('showClientes');
Route::get('/editCliente/{id}', 'ClienteController@editCliente')->name('editCliente');
Route::put('/updateCliente/{id}', 'ClienteController@updateCliente')->name('updateCliente');

//Rotas Pizzas
Route::post('/createPizza', 'PizzaController@createPizza')->name('createPizza');
Route::get('/deletePizza/{id}','PizzaController@deletePizza')->name('deletePizza');
Route::get('/showPizzas', 'PizzaController@showPizzas')->name('showPizzas');
Route::get('/editPizza/{id}', 'PizzaController@editPizza')->name('editPizza');
Route::put('/updatePizza/{id}', 'PizzaController@updatePizza')->name('updatePizza');

//Rotas Pedidos
Route::post('/createPedido', 'PedidoController@createPedido')->name('createPedido');
Route::get('/deletePedido/{id}','PedidoController@deletePedido')->name('deletePedido');
Route::get('/showPedidos', 'PedidoController@showPedidos')->name('showPedidos');
Route::get('/concluirPedido/{id}','PedidoController@concluirPedido')->name('concluirPedido');