<?php

namespace App\Http\Controllers\seguridad;

use App\Reporte;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReporteController extends Controller
{
    function formulario(){
        $reporte = Reporte::findOrFail(1);
        return view('seguridad.reporte.formulario', ['reporte' => $reporte]);
    }

    function guardar(Request $request){
        $reporte = Reporte::findOrFail(1);
        $reporte -> codigo = $request['codigo'];
        $reporte -> fecha = $request['fecha'];
        $reporte -> revision = $request['revision'];
        $reporte -> save();

        return redirect('seg/configuracion');
    }
}
