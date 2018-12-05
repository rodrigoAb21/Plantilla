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
    return redirect('/act');
});

Route::get('/home', function () {
    return redirect('/act');
});

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::middleware('suministros')->group(function () {
        Route::get('/sum', function () {
            return view('layouts.dashboard-suministros');
        });


        Route::resource('/sum/lineas', 'suministros\LineaController');
        Route::post('sum/lineas/{id}/grupo', 'suministros\LineaController@guardarGrupo');
        Route::patch('sum/lineas/{idLinea}/grupo/{idGrupo}', 'suministros\LineaController@actualizarGrupo');
        Route::delete('sum/lineas/{idLinea}/grupo/{idGrupo}', 'suministros\LineaController@eliminarGrupo');
        Route::resource('/sum/suministros', 'suministros\SuministroController');
        Route::resource('/sum/mov-suministros/ingresos', 'suministros\IngresoController');
        Route::resource('/sum/mov-suministros/salidas', 'suministros\SalidaController');
        Route::resource('/sum/medidas', 'suministros\UnidadMedidaController');
        Route::get('/sum/reportes/inventario', 'suministros\ReporteSumController@inventario');
        Route::get('/sum/reportes/inventario/PDF', 'suministros\ReporteSumController@inventarioPDF');

        Route::get('/sum/reportes/movimientos', 'suministros\ReporteSumController@movimientos');

    });

    Route::middleware('activos')->group(function () {
        Route::get('/act', function () {
            return view('layouts.dashboard-activos');
        });

        Route::resource('/act/lineas', 'activos\LineaAController');
        Route::post('act/lineas/{id}/grupo', 'activos\LineaAController@guardarGrupo');
        Route::patch('act/lineas/{idLinea}/grupo/{idGrupo}', 'activos\LineaAController@actualizarGrupo');
        Route::delete('act/lineas/{idLinea}/grupo/{idGrupo}', 'activos\LineaAController@eliminarGrupo');

        Route::resource('/act/estados', 'activos\EstadoController');
        Route::resource('/act/activos', 'activos\ActivoController');
        Route::resource('/act/revaluos', 'activos\RevaluoController');
        Route::resource('/act/mov-activos/ingresos', 'activos\IngresoController');
        Route::resource('/act/mov-activos/traslados', 'activos\TrasladoController');
        Route::get('/act/reportes/inventario','activos\ReporteActController@inventario');
    });


    Route::middleware('admin')->group(function () {
        Route::get('/seg', function () {
            return view('layouts.dashboard-seguridad');
        });
        Route::resource('/seg/usuarios', 'seguridad\UsuarioController');
        Route::patch('/seg/usuarios/{id}/habilitar', 'seguridad\UsuarioController@habilitar');

        Route::resource('/seg/bitacora', 'seguridad\BitacoraController');
        Route::resource('/seg/ubicaciones', 'seguridad\UbicacionController');
        Route::resource('/seg/estadisticas', 'seguridad\EstadisticaController');
    });
});

