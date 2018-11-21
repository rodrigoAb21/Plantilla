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
Route::resource('/suministros', 'SuministroController');
Route::resource('/mov-suministros/ingresos', 'IngresoController');
Route::resource('/mov-suministros/salidas', 'SalidaController');
Route::resource('/mov-suministros/devoluciones', 'DevolucionController');
Route::resource('/medidas', 'UnidadMedidaController');
Route::resource('/reportes', 'ReporteSumController');

