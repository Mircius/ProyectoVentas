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
Route::get('/',['uses' => 'ClientesControler@getClientes', 'as' => '/']);

//NUEVO CLIENTE
// Route::get('/create', 'ClientesControler@getCreate');
Route::get('/create', ['uses' => 'ClientesControler@getCreate', 'as' => 'create']);

Route::post('/create', 'ClientesControler@save');

//ACTUALIZAR CLIENTES
// Route::get('/cliente/{id}', 'ClientesControler@edit');
Route::post('/cliente/{id}', 'ClientesControler@update');
Route::get('/cliente/{id}', ['uses' => 'ClientesControler@edit', 'as' => 'cliente']);

//NUEVA VENTA
// Route::get('/cliente/nuevaVenta/{id}', 'ClientesControler@newSale');
Route::get('/cliente/nuevaVenta/{id}',['uses' => 'ClientesControler@newSale', 'as' => 'nuevaVenta']);

Route::post('/cliente/nuevaVentaSave/{id}', 'ClientesControler@newSaleSave');

//VENTA POR CLIENTE
// Route::get('/cliente/venta/{id}', 'ClientesControler@getVenta');
Route::get('/cliente/venta/{id}',['uses' => 'ClientesControler@getVenta', 'as' => 'detalle']);


//SUBIDA DE ARCHIVOS
Route::post('/cliente/subida/{id}', 'ClientesControler@fileSave');

//MODIFICACION DE ARCHIVOS
Route::post('/cliente/updateArchivo/{id}', 'ClientesControler@updateArchivo');
//DESCARGA ARCHIVOS
Route::get('/download/{nombre}','DownloadFile@downloadArchivo');