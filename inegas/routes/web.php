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
    return view('auth.login');
});


Route::get('/sum', function () {
    return view('layouts.dashboard-suministros');
});

Auth::routes();

Route::resource('/sum/categorias-sum', 'CategoriaSumController');
Route::resource('/sum/suministros', 'SuministroController');
Route::resource('/sum/mov-suministros/ingresos', 'IngresoController');
Route::resource('/sum/mov-suministros/salidas', 'SalidaController');
Route::resource('/sum/mov-suministros/devoluciones', 'DevolucionController');
Route::resource('/sum/medidas', 'UnidadMedidaController');
Route::get('/sum/reportes/inventario', 'ReporteSumController@inventario');
Route::get('/sum/reportes/movimientos', 'ReporteSumController@movimientos');


Route::get('/act', function () {
    return view('layouts.dashboard-activos');
});





Route::get('/seguridad', function () {
    return view('layouts.dashboard-seguridad');
});
