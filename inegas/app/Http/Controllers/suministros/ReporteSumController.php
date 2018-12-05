<?php

namespace App\Http\Controllers\suministros;

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
        return view('suministros.reportes-sum.inventario', ['suministros' => $suministros, 'busqueda' => trim($request['busqueda'])]);
    }

    public static function inventarioPDF(){
        $pdf = PDF::loadView('suministros.reportes-sum.inventarioPDF',["informe" => "SOY UNA VARIABLE"]);
        return $pdf->download('inventario.pdf');
    }

    public function movimientos()
    {
        return view('suministros.reportes-sum.movimientos');
    }

}
