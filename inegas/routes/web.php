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
    return view('layouts.dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/categorias-sum', 'CategoriaSumController');
Route::resource('/inventario', 'UnidadMedidaController');
Route::resource('/mov-suministros/ingresos', 'UnidadMedidaController');
Route::resource('/mov-suministros/salidas', 'UnidadMedidaController');
Route::resource('/mov-suministros/devoluciones', 'UnidadMedidaController');
Route::resource('/medidas', 'UnidadMedidaController');
Route::resource('/reportes', 'UnidadMedidaController');

