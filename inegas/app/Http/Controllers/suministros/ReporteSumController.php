<?php

namespace App\Http\Controllers\suministros;

use App\IngresoSuministro;
use App\SalidaSuministro;
use App\Visitas;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReporteSumController extends Controller
{
    public function inventario(Request $request)
    {
        $suministros = DB::table('suministro')
            ->join('grupo_s','suministro.grupo_s_id','=','grupo_s.id')
            ->join('linea_s','grupo_s.linea_s_id','=', 'linea_s.id')
            ->join('unidad_medida','suministro.unidad_medida_id','=','unidad_medida.id')
            ->where('suministro.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('suministro.codigo', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('suministro.marca', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('unidad_medida.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('grupo_s.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('linea_s.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('suministro.visible', '=', true)
            ->select('suministro.id','suministro.nombre', 'suministro.stock_minimo','suministro.stock_maximo','suministro.stock','suministro.marca','suministro.descripcion', 'suministro.codigo','grupo_s.nombre as grupo','unidad_medida.nombre as medida', 'linea_s.nombre as linea')
            ->orderBy('suministro.id', 'desc')
            ->paginate(10);

        Visitas::incrementar(20);

        return view('suministros.reportes-sum.inventario', ['suministros' => $suministros, 'busqueda' => trim($request['busqueda']),'visitas' => Visitas::findOrFail(20)]);
    }

    public static function inventarioPDF(){
        $suministros = DB::table('suministro')
            ->join('grupo_s','suministro.grupo_s_id','=','grupo_s.id')
            ->join('linea_s','grupo_s.linea_s_id','=', 'linea_s.id')
            ->join('unidad_medida','suministro.unidad_medida_id','=','unidad_medida.id')
            ->where('suministro.visible', '=', true)
            ->select('suministro.id','suministro.nombre', 'suministro.stock_minimo','suministro.stock_maximo','suministro.stock','suministro.marca','suministro.descripcion', 'suministro.codigo','grupo_s.nombre as grupo','unidad_medida.nombre as medida', 'linea_s.nombre as linea')
            ->orderBy('suministro.id', 'desc')
            ->paginate(10);
        $pdf = PDF::loadView('suministros.reportes-sum.inventarioPDF',["suministros" => $suministros]);
        return $pdf->download('inventario.pdf');
    }

    public function ingreso()
    {
        $ingresos = IngresoSuministro::orderBy('id','asc')->paginate(10);
        Visitas::incrementar(21);

        return view('suministros.reportes-sum.ingreso', ['ingresos' => $ingresos,'visitas' => Visitas::findOrFail(21)]);
    }

    public function ingresoPDF()
    {
        $ingresos = IngresoSuministro::orderBy('id','asc')->get();
        $pdf = PDF::loadView('suministros.reportes-sum.ingresoPDF',['ingresos' => $ingresos]);
        return $pdf->download('ingresos.pdf');
    }

    public function salida()
    {
        $salidas = DB::table('salida_s')
            ->join('trabajador','salida_s.trabajador_id','=','trabajador.id')
            ->join('ubicacion','trabajador.ubicacion_id','=','ubicacion.id')
            ->select('salida_s.id', 'salida_s.fecha', 'salida_s.estado', 'ubicacion.nombre as ubicacion', 'trabajador.nombre as recibe')
            ->orderBy('salida_s.id', 'desc')
            ->paginate(10);

        Visitas::incrementar(22);
        return view('suministros.reportes-sum.salida', ['salidas' => $salidas,'visitas' => Visitas::findOrFail(22)]);
    }

    public function salidaPDF()
    {
        $salidas = DB::table('salida_s')
            ->join('trabajador','salida_s.trabajador_id','=','trabajador.id')
            ->join('ubicacion','trabajador.ubicacion_id','=','ubicacion.id')
            ->select('salida_s.id', 'salida_s.fecha', 'salida_s.estado', 'ubicacion.nombre as ubicacion', 'trabajador.nombre as recibe')
            ->orderBy('salida_s.id', 'desc')
            ->get();

        $pdf = PDF::loadView('suministros.reportes-sum.salidaPDF',['salidas' => $salidas]);
        return $pdf->download('salidas.pdf');
    }


}
