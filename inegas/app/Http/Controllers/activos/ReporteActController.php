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

    public function vista_asignacion(Request $request){
        $asignaciones = DB::table('asignacion')
            ->join('trabajador','asignacion.trabajador_id','=','trabajador.id')
            ->join('area','trabajador.area_id','=','area.id')
            ->join('ubicacion','area.id','=','ubicacion.area_id')
            ->orderBy('asignacion.id','desc')
            ->where('trabajador.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('ubicacion.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->select('asignacion.id', 'asignacion.fecha', 'asignacion.observacion', 'trabajador.nombre as responsable', 'ubicacion.nombre as ubicacion', 'area.nombre as area')
            ->paginate(10);

        return view('activos.reportes-act.asignacion', ['asignaciones' => $asignaciones, 'busqueda' => trim($request['busqueda'])]);
    }


    public function asignacionPDF(){
        $asignaciones = DB::table('asignacion')
            ->join('trabajador','asignacion.trabajador_id','=','trabajador.id')
            ->join('area','trabajador.area_id','=','area.id')
            ->join('ubicacion','area.id','=','ubicacion.area_id')
            ->orderBy('asignacion.id','asc')
            ->select('asignacion.id', 'asignacion.fecha', 'asignacion.observacion', 'trabajador.nombre as responsable', 'trabajador.cargo', 'ubicacion.nombre as ubicacion', 'area.nombre as area')
            ->get();
        $pdf = PDF::loadView('activos.reportes-act.asignacionPDF',['asignaciones' => $asignaciones]);
        return $pdf->download('asignaciones.pdf');
    }




    // --------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------





    public function ver_asignacion($id){
        $asignacion = DB::table('asignacion')
            ->where('asignacion.id', '=', $id)
            ->join('trabajador','asignacion.trabajador_id','=','trabajador.id')
            ->join('area','trabajador.area_id','=','area.id')
            ->join('ubicacion','area.id','=','ubicacion.area_id')
            ->select('asignacion.id', 'asignacion.fecha', 'asignacion.observacion', 'trabajador.nombre as responsable', 'trabajador.cargo', 'ubicacion.nombre as ubicacion', 'area.nombre as area')
            ->first();

        $activos = DB::table('activo_fijo')
            ->join('grupo_a','activo_fijo.grupo_a_id','=','grupo_a.id')
            ->join('linea_a','grupo_a.linea_a_id','=','linea_a.id')
            ->join('detalle_asig','activo_fijo.id','=','detalle_asig.activo_fijo_id')
            ->where('detalle_asig.asignacion_id', '=', $id)
            ->select('activo_fijo.id', 'activo_fijo.codigo', 'grupo_a.nombre as grupo', 'linea_a.nombre as linea')
            ->where('activo_fijo.disponibilidad', '!=', 'Baja')
            ->get();

        return view('activos.reportes-act.ver-asignacion',['asignacion' => $asignacion, 'activos' => $activos]);
    }

    public function ver_asignacion_pdf($id){
        $asignacion = DB::table('asignacion')
            ->where('asignacion.id', '=', $id)
            ->join('trabajador','asignacion.trabajador_id','=','trabajador.id')
            ->join('area','trabajador.area_id','=','area.id')
            ->join('ubicacion','area.id','=','ubicacion.area_id')
            ->select('asignacion.id', 'asignacion.fecha', 'asignacion.observacion', 'trabajador.nombre as responsable', 'trabajador.cargo', 'ubicacion.nombre as ubicacion', 'area.nombre as area')
            ->first();

        $activos = DB::table('activo_fijo')
            ->join('grupo_a','activo_fijo.grupo_a_id','=','grupo_a.id')
            ->join('linea_a','grupo_a.linea_a_id','=','linea_a.id')
            ->join('detalle_asig','activo_fijo.id','=','detalle_asig.activo_fijo_id')
            ->where('detalle_asig.asignacion_id', '=', $id)
            ->select('activo_fijo.id', 'activo_fijo.codigo', 'grupo_a.nombre as grupo', 'linea_a.nombre as linea')
            ->where('activo_fijo.disponibilidad', '!=', 'Baja')
            ->get();

        $pdf = PDF::loadView('activos.reportes-act.ver-asignacionPDF',['asignacion' => $asignacion, 'activos' => $activos]);
        return $pdf->download('asignacion-'.$id.'.pdf');
    }




    // --------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------





    public function vista_inventario(Request $request){

        $activos = DB::table('activo_fijo')
            ->join('trabajador','activo_fijo.trabajador_id','=','trabajador.id')
            ->join('area','trabajador.area_id','=','area.id')
            ->join('ubicacion','area.id','=','ubicacion.area_id')
            ->where('activo_fijo.codigo', 'LIKE','%'.trim($request['busqueda']).'%')
            ->select('activo_fijo.id', 'activo_fijo.codigo','activo_fijo.marca','activo_fijo.color','activo_fijo.modelo','activo_fijo.serie', 'activo_fijo.disponibilidad', 'trabajador.nombre as responsable', 'ubicacion.nombre as ubicacion', 'area.nombre as area')
            ->orderBy('activo_fijo.codigo', 'asc')
            ->paginate(10);
        $hoy = Carbon::now('America/La_Paz')->toDateString();


        return view('activos.reportes-act.inventario', ['activos' => $activos, 'hoy' => $hoy, 'busqueda' => trim($request['busqueda'])]);
    }


    public function inventarioPDF(){
        $activos = DB::table('activo_fijo')
            ->join('trabajador','activo_fijo.trabajador_id','=','trabajador.id')
            ->join('area','trabajador.area_id','=','area.id')
            ->join('ubicacion','area.id','=','ubicacion.area_id')
            ->select('activo_fijo.id', 'activo_fijo.codigo','activo_fijo.marca','activo_fijo.color','activo_fijo.modelo','activo_fijo.serie', 'activo_fijo.disponibilidad', 'trabajador.nombre as responsable', 'ubicacion.nombre as ubicacion', 'area.nombre as area')
            ->orderBy('activo_fijo.codigo', 'asc')
            ->get();

        $pdf = PDF::loadView('activos.reportes-act.inventarioPDF',['activos' => $activos])->setPaper('letter', 'landscape');
        return $pdf->download('inventario.pdf');
    }


    // --------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------



    public function vista_ingreso(Request $request){
        $ingresos = DB::table('ingreso_a')
            ->where('nro_factura', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('proveedor', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('estado', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orderBy('id', 'asc')
            ->paginate(10);


        return view('activos.reportes-act.ingreso', ['ingresos' => $ingresos, 'busqueda' => trim($request['busqueda'])]);
    }



    public function ingresoPDF(){
        $ingresos = DB::table('ingreso_a')
            ->join('users', 'users.id', '=', 'ingreso_a.user_id')
            ->select('ingreso_a.id', 'ingreso_a.fecha_ingreso', 'ingreso_a.fecha_factura', 'ingreso_a.foto_factura', 'ingreso_a.nro_factura', 'ingreso_a.proveedor', 'ingreso_a.estado', 'users.nombre as emitido')
            ->orderBy('id', 'asc')
            ->get();

        $pdf = PDF::loadView('activos.reportes-act.ingresoPDF',['ingresos' => $ingresos]);
        return $pdf->download('ingresos.pdf');
    }


    // --------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------



    public function trasladoPDF(){
        $traslados = DB::table('traslado')
            ->join('ubicacion', 'traslado.ubicacion_id','=','ubicacion.id')
            ->select('traslado.id','traslado.fecha', 'ubicacion.nombre as ubicacion')
            ->orderBy('traslado.id','asc')
            ->get();

        $pdf = PDF::loadView('activos.reportes-act.trasladoPDF',['traslados' => $traslados]);
        return $pdf->download('traslados.pdf');
    }



    public function vista_traslado(Request $request){
        $traslados = DB::table('traslado')
            ->join('ubicacion', 'traslado.ubicacion_id','=','ubicacion.id')
            ->where('ubicacion.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->select('traslado.id','traslado.fecha', 'ubicacion.nombre as ubicacion')
            ->orderBy('traslado.id','asc')
            ->paginate(10);


        return view('activos.reportes-act.traslado', ['traslados' => $traslados, 'busqueda' => trim($request['busqueda'])]);
    }



    // --------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------



}
