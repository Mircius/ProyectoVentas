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
// LISTA DE CLIENTES
Route::get('/', 'ClientesControler@getClientes');

//NUEVO CLIENTE
Route::get('/create', 'ClientesControler@getCreate');
Route::post('/create', 'ClientesControler@save');

//ACTUALIZAR CLIENTES
Route::get('/cliente/{id}', 'ClientesControler@edit');
Route::post('/cliente/{id}', 'ClientesControler@update');

//NUEVA VENTA
Route::get('/cliente/nuevaVenta/{id}', 'ClientesControler@newSale');

//VENTA POR CLIENTE
Route::get('/cliente/venta/{id}', 'ClientesControler@getVenta');

//SUBIDA DE ARCHIVOS
Route::post('/cliente/subida/{id}', 'ClientesControler@fileSave');