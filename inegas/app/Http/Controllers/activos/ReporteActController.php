<?php

namespace App\Http\Controllers\activos;

use App\Asignacion;
use App\Visitas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReporteActController extends Controller
{
    public function vista_inventario(Request $request){

        $activos = DB::table('activo_fijo')
            ->join('grupo_a', 'activo_fijo.grupo_a_id', '=', 'grupo_a.id')
            ->join('linea_a', 'grupo_a.linea_a_id', '=', 'linea_a.id')
            ->select('activo_fijo.id', 'activo_fijo.codigo','activo_fijo.serie', 'grupo_a.nombre as grupo', 'linea_a.nombre as linea','activo_fijo.disponibilidad')
            ->orderBy('activo_fijo.codigo', 'asc')
            ->paginate(10);
        $hoy = Carbon::now('America/La_Paz')->toDateString();

        Visitas::incrementar(16);

        return view('activos.reportes-act.inventario', ['activos' => $activos, 'hoy' => $hoy, 'busqueda' => trim($request['busqueda']),'visitas' => Visitas::findOrFail(16)]);
    }

    public function vista_ingreso(Request $request){
        $ingresos = DB::table('ingreso_s')
            ->where('nro_factura', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('proveedor', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('estado', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orderBy('id', 'asc')
            ->paginate(10);

        Visitas::incrementar(17);

        return view('activos.reportes-act.ingreso', ['ingresos' => $ingresos, 'busqueda' => trim($request['busqueda']),'visitas' => Visitas::findOrFail(17)]);
    }

    public function vista_traslado(Request $request){
        $traslados = DB::table('traslado')
            ->join('ubicacion', 'traslado.ubicacion_id','=','ubicacion.id')
            ->where('ubicacion.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->select('traslado.id','traslado.fecha', 'ubicacion.nombre as ubicacion')
            ->orderBy('traslado.id','asc')
            ->paginate(10);

        Visitas::incrementar(18);

        return view('activos.reportes-act.traslado', ['traslados' => $traslados, 'busqueda' => trim($request['busqueda']),'visitas' => Visitas::findOrFail(18)]);
    }

    public function vista_asignacion(Request $request){
        $asignaciones = Asignacion::orderBy('asignacion.id','asc')
            ->where('responsable', 'LIKE','%'.trim($request['busqueda']).'%')
            ->paginate(10);

        Visitas::incrementar(19);

        return view('activos.reportes-act.asignacion', ['asignaciones' => $asignaciones, 'busqueda' => trim($request['busqueda']),'visitas' => Visitas::findOrFail(19)]);
    }



    public function inventarioPDF(){
        $activos = DB::table('activo_fijo')
            ->join('grupo_a', 'activo_fijo.grupo_a_id', '=', 'grupo_a.id')
            ->join('linea_a', 'grupo_a.linea_a_id', '=', 'linea_a.id')
            ->select('activo_fijo.id', 'activo_fijo.codigo','activo_fijo.serie', 'grupo_a.nombre as grupo', 'linea_a.nombre as linea','activo_fijo.disponibilidad')
            ->orderBy('activo_fijo.codigo', 'asc')
            ->paginate(10);
        $hoy = Carbon::now('America/La_Paz')->toDateString();

        $pdf = PDF::loadView('activos.reportes-act.inventarioPDF',['activos' => $activos, 'hoy' => $hoy]);
        return $pdf->download('inventario.pdf');
    }

    public function ingresoPDF(){
        $ingresos = DB::table('ingreso_s')
            ->orderBy('id', 'asc')
            ->paginate(10);

        $pdf = PDF::loadView('activos.reportes-act.ingresoPDF',['ingresos' => $ingresos]);
        return $pdf->download('ingresos.pdf');
    }

    public function trasladoPDF(){
        $traslados = DB::table('traslado')
            ->join('ubicacion', 'traslado.ubicacion_id','=','ubicacion.id')
            ->select('traslado.id','traslado.fecha', 'ubicacion.nombre as ubicacion')
            ->orderBy('traslado.id','asc')
            ->get();

        $pdf = PDF::loadView('activos.reportes-act.trasladoPDF',['traslados' => $traslados]);
        return $pdf->download('traslados.pdf');
    }

    public function asignacionPDF(){
        $asignaciones = Asignacion::orderBy('asignacion.id','asc')
            ->get();

        $pdf = PDF::loadView('activos.reportes-act.asignacionPDF',['asignaciones' => $asignaciones]);
        return $pdf->download('asignaciones.pdf');
    }

}
