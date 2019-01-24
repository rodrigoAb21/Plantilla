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

Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);
Route::post('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

Route::middleware('auth')->group(function () {

    Route::middleware('suministros')->group(function () {
        Route::get('/sum', function () {
            return view('layouts.dashboard-suministros');
        });


        Route::resource('sum/administracion/lineas', 'suministros\LineaController');
        Route::post('sum/administracion/lineas/{id}/grupo', 'suministros\LineaController@guardarGrupo');
        Route::patch('sum/administracion/lineas/{idLinea}/grupo/{idGrupo}', 'suministros\LineaController@actualizarGrupo');
        Route::delete('sum/administracion/lineas/{idLinea}/grupo/{idGrupo}', 'suministros\LineaController@eliminarGrupo');
        Route::resource('/sum/suministros', 'suministros\SuministroController');
        Route::resource('/sum/mov-suministros/ingresos', 'suministros\IngresoController');
        Route::resource('/sum/mov-suministros/salidas', 'suministros\SalidaController');
        Route::get('sum/mov-suministros/salidasPDF/{id}', 'suministros\SalidaController@salidasPDF');
        Route::resource('sum/administracion/u_medidas', 'suministros\UnidadMedidaController');




        Route::get('sum/reportes/faltantes', 'suministros\ReporteSumController@faltantes');
        Route::get('sum/reportes/faltantesPDF', 'suministros\ReporteSumController@faltantesPDF');

        Route::get('/sum/reportes/inventario', 'suministros\ReporteSumController@inventario');
        Route::get('/sum/reportes/inventarioPDF', 'suministros\ReporteSumController@inventarioPDF');

        Route::get('/sum/reportes/movimientos/ingresos', 'suministros\ReporteSumController@ingreso');
        Route::get('/sum/reportes/movimientos/ingresosPDF', 'suministros\ReporteSumController@ingresoPDF');

        Route::get('sum/reportes/kardex',
 'suministros\ReporteSumController@kardex');


        Route::get('/sum/reportes/movimientos/salidas', 'suministros\ReporteSumController@salida');
        Route::get('/sum/reportes/movimientos/salidasPDF', 'suministros\ReporteSumController@salidaPDF');

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
        Route::get('/act/activos/{id}/estados', 'activos\ActivoController@estados');
        Route::get('/act/activos/{id}/estados/asignar', 'activos\ActivoController@asignar_estado');
        Route::post('/act/activos/{id}/estados', 'activos\ActivoController@guardar_asignacion');
        Route::delete('/act/activos/{activo_id}/estados/{id}', 'activos\ActivoController@eliminar_asignacion');

        Route::resource('/act/revaluos', 'activos\RevaluoController');
        Route::resource('/act/mov-activos/ingresos', 'activos\IngresoController');
//        Route::resource('/act/mov-activos/traslados', 'activos\TrasladoController');
        Route::resource('/act/mov-activos/asignaciones', 'activos\AsignacionController');
        Route::get('/act/reportes/inventario','activos\ReporteActController@inventario');



        Route::get('/act/reportes/inventario', 'activos\ReporteActController@vista_inventario');
        Route::get('/act/reportes/inventarioPDF', 'activos\ReporteActController@inventarioPDF');

        Route::get('/act/reportes/ingresos', 'activos\ReporteActController@vista_ingreso');
        Route::get('/act/reportes/ingresosPDF', 'activos\ReporteActController@ingresoPDF');

//        Route::get('/act/reportes/traslados', 'activos\ReporteActController@vista_traslado');
//        Route::get('/act/reportes/trasladosPDF', 'activos\ReporteActController@trasladoPDF');

        Route::get('/act/reportes/asignaciones', 'activos\ReporteActController@vista_asignacion');
        Route::get('/act/reportes/asignacionesPDF', 'activos\ReporteActController@asignacionPDF');

        Route::get('/act/reportes/asignaciones/{id}', 'activos\ReporteActController@ver_asignacion');
        Route::get('/act/reportes/asignaciones/{id}/PDF', 'activos\ReporteActController@ver_asignacion_pdf');




    });


    Route::middleware('admin')->group(function () {
        Route::get('/seg', function () {
            return view('layouts.dashboard-seguridad');
        });
        Route::resource('/seg/usuarios', 'seguridad\UsuarioController');
        Route::patch('/seg/usuarios/{id}/habilitar', 'seguridad\UsuarioController@habilitar');

        Route::resource('/seg/bitacora', 'seguridad\BitacoraController');

        Route::resource('/seg/areas', 'seguridad\AreaController');
        Route::post('seg/areas/{id}/ubicaciones', 'seguridad\AreaController@guardarUbicacion');
        Route::patch('seg/areas/{idArea}/ubicaciones/{idUbi}', 'seguridad\AreaController@actualizarUbicacion');
        Route::delete('seg/areas/{idArea}/ubicaciones/{idUbi}', 'seguridad\AreaController@eliminarUbicacion');

        Route::resource('/seg/trabajadores', 'seguridad\TrabajadorController');

        Route::get('/seg/configuracion', 'seguridad\ReporteController@formulario');
        Route::post('/seg/configuracion', 'seguridad\ReporteController@guardar');


        Route::resource('/seg/estadisticas', 'seguridad\EstadisticaController');
    });
});

