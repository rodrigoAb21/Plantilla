<?php

namespace App\Http\Controllers\suministros;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReporteSumController extends Controller
{
    public function faltantes(Request $request)
    {
        $suministros = DB::table('suministro')
            ->join('grupo_s','suministro.grupo_s_id','=','grupo_s.id')
            ->join('linea_s','grupo_s.linea_s_id','=', 'linea_s.id')
            ->join('unidad_medida','suministro.unidad_medida_id','=','unidad_medida.id')
            ->where('suministro.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->whereColumn('suministro.stock_minimo', '>', 'suministro.stock')
            ->where('suministro.visible', '=', true)
            ->select('suministro.id','suministro.nombre', 'suministro.stock_minimo','suministro.stock_maximo','suministro.stock','suministro.marca','suministro.descripcion', 'suministro.codigo','grupo_s.nombre as grupo','unidad_medida.nombre as medida', 'linea_s.nombre as linea')
            ->orderBy('suministro.id', 'desc')
            ->paginate(10);


        return view('suministros.reportes-sum.faltantes', ['suministros' => $suministros, 'busqueda' => trim($request['busqueda'])]);
    }



    public static function faltantesPDF(){
        $suministros = DB::table('suministro')
            ->join('grupo_s','suministro.grupo_s_id','=','grupo_s.id')
            ->join('linea_s','grupo_s.linea_s_id','=', 'linea_s.id')
            ->join('unidad_medida','suministro.unidad_medida_id','=','unidad_medida.id')
            ->whereColumn('suministro.stock_minimo', '>', 'suministro.stock')
            ->where('suministro.visible', '=', true)
            ->select('suministro.id','suministro.nombre', 'suministro.stock_minimo','suministro.stock_maximo','suministro.stock','suministro.marca','suministro.descripcion', 'suministro.codigo','grupo_s.nombre as grupo','unidad_medida.nombre as medida', 'linea_s.nombre as linea')
            ->orderBy('linea_s.nombre', 'desc')
            ->orderBy('grupo_s.nombre', 'desc')
            ->get();
        $pdf = PDF::loadView('suministros.reportes-sum.faltantesPDF',["suministros" => $suministros])->setPaper('letter', 'landscape');
        return $pdf->download('faltantes.pdf');
    }




    public function inventario(Request $request)
    {
        $suministros = DB::table('suministro')
            ->join('unidad_medida','suministro.unidad_medida_id','=','unidad_medida.id')
            ->where('suministro.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('suministro.codigo', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('suministro.marca', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('unidad_medida.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('suministro.visible', '=', true)
            ->select('suministro.id','suministro.nombre', 'suministro.stock_minimo','suministro.stock_maximo','suministro.stock','suministro.marca','suministro.descripcion', 'suministro.codigo','unidad_medida.nombre as medida')
            ->paginate(10);

        return view('suministros.reportes-sum.inventario', ['suministros' => $suministros, 'busqueda' => trim($request['busqueda'])]);
    }



    public static function inventarioPDF(){
        $suministros = DB::table('suministro')
            ->join('unidad_medida','suministro.unidad_medida_id','=','unidad_medida.id')
            ->where('suministro.visible', '=', true)
            ->select('suministro.id','suministro.nombre', 'suministro.stock_minimo','suministro.stock_maximo','suministro.stock','suministro.marca','suministro.descripcion', 'suministro.codigo','unidad_medida.nombre as medida')
            ->get();
        $pdf = PDF::loadView('suministros.reportes-sum.inventarioPDF',["suministros" => $suministros])->setPaper('letter', 'landscape');
        return $pdf->download('inventario.pdf');
    }



    public function ingreso(Request $request)
    {
        $ingresos =  DB::table('ingreso_s')
            ->where('nro_factura', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('proveedor', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('estado', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('suministros.reportes-sum.ingreso', ['ingresos' => $ingresos, 'busqueda' => trim($request['busqueda'])]);
    }

    public function ingresoPDF()
    {
        $ingresos =  DB::table('ingreso_s')
            ->join('users','users.id', '=', 'ingreso_s.user_id')
            ->select('ingreso_s.id','ingreso_s.fecha_ingreso', 'ingreso_s.proveedor','ingreso_s.foto_factura','ingreso_s.nro_factura','ingreso_s.fecha_factura','ingreso_s.estado', 'users.nombre as emitido')
            ->orderBy('ingreso_s.id', 'asc')
            ->get();

        $pdf = PDF::loadView('suministros.reportes-sum.ingresoPDF',['ingresos' => $ingresos]);
        return $pdf->download('ingresos.pdf');
    }

    public function salida(Request $request)
    {
        $salidas = DB::table('salida_s')
            ->join('trabajador','salida_s.trabajador_id','=','trabajador.id')
            ->join('area','trabajador.area_id','=','area.id')
            ->where('area.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('trabajador.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('salida_s.estado', 'LIKE','%'.trim($request['busqueda']).'%')
            ->select('salida_s.id', 'salida_s.fecha', 'salida_s.estado', 'area.nombre as area', 'trabajador.nombre as recibe')
            ->orderBy('salida_s.id', 'desc')
            ->paginate(10);

        return view('suministros.reportes-sum.salida', ['salidas' => $salidas, 'busqueda' => trim($request['busqueda'])]);
    }

    public function salidaPDF()
    {
        $salidas = DB::table('salida_s')
            ->join('trabajador','salida_s.trabajador_id','=','trabajador.id')
            ->join('area','trabajador.area_id','=','area.id')
            ->join('ubicacion','area.id','=','ubicacion.area_id')
            ->join('users','users.id','=','salida_s.user_id')
            ->select('salida_s.id', 'salida_s.fecha', 'salida_s.estado', 'ubicacion.nombre as ubicacion', 'trabajador.nombre as recibe', 'users.nombre as emitido')
            ->orderBy('salida_s.id', 'desc')
            ->get();

        $pdf = PDF::loadView('suministros.reportes-sum.salidaPDF',['salidas' => $salidas]);
        return $pdf->download('salidas.pdf');
    }


}
