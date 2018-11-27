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

Route::resource('/sum/categorias-sum', 'suministros\CategoriaSumController');
Route::resource('/sum/suministros', 'suministros\SuministroController');
Route::resource('/sum/mov-suministros/ingresos', 'suministros\IngresoController');
Route::resource('/sum/mov-suministros/salidas', 'suministros\SalidaController');
Route::resource('/sum/mov-suministros/devoluciones', 'suministros\DevolucionController');
Route::resource('/sum/medidas', 'suministros\UnidadMedidaController');
Route::get('/sum/reportes/inventario', 'suministros\ReporteSumController@inventario');
Route::get('/sum/reportes/movimientos', 'suministros\ReporteSumController@movimientos');


Route::get('/act', function () {
    return view('layouts.dashboard-activos');
});

Route::resource('/act/categorias-act', 'activos\CategoriaActController');
Route::resource('/act/activos', 'activos\ActivoController');
Route::resource('/act/revaluos', 'activos\RevaluoController');
Route::resource('/act/mov-activos/ingresos', 'activos\IngresoController');
Route::resource('/act/mov-activos/traslados', 'activos\TrasladoController');
Route::get('/act/reportes/inventario','activos\ReporteActController@inventario');


Route::get('/seg', function () {
    return view('layouts.dashboard-seguridad');
});
Route::resource('/seg/usuarios', 'seguridad\UsuarioController');
Route::resource('/seg/bitacora', 'seguridad\BitacoraController');
Route::resource('/seg/departamentos', 'seguridad\DepartamentoController');
Route::resource('/seg/estadisticas', 'seguridad\EstadisticaController');