<?php

namespace App\Http\Controllers\suministros;

use App\Bitacora;
use App\Grupo;
use App\Suministro;
use App\Tablas;
use App\UnidadMedida;
use App\Visitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SuministroController extends Controller
{
    public function index(Request $request)
    {
        $suministros = DB::table('suministro')
            ->join('grupo_s','suministro.grupo_s_id','=','grupo_s.id')
            ->join('linea_s','grupo_s.linea_s_id','=', 'linea_s.id')
            ->join('unidad_medida','suministro.unidad_medida_id','=','unidad_medida.id')
            ->where('suministro.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('suministro.codigo', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('suministro.marca', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('unidad_medida.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('suministro.visible', '=', true)
            ->select('suministro.id','suministro.nombre', 'suministro.stock_minimo','suministro.stock_maximo','suministro.stock','suministro.marca','suministro.descripcion', 'suministro.codigo','grupo_s.nombre as grupo','unidad_medida.nombre as medida', 'linea_s.nombre as linea')
            ->orderBy('suministro.id', 'desc')
            ->paginate(10);

        return view('suministros.suministros.index', ['suministros' => $suministros, 'busqueda' => trim($request['busqueda'])]);
    }


    public function create()
    {
        $medidas = UnidadMedida::where('visible', '=', true)->get();
        $grupos = DB::table('grupo_s')
            ->join('linea_s','grupo_s.linea_s_id','=', 'linea_s.id')
            ->where('grupo_s.visible','=', true)
            ->select('grupo_s.id', 'grupo_s.nombre as grupo', 'linea_s.nombre as linea', 'grupo_s.linea_s_id')
            ->orderBy('grupo_s.linea_s_id', 'asc')
            ->orderBy('grupo_s.id', 'asc')
            ->get();
        return view('suministros.suministros.create',['medidas' => $medidas, 'grupos' => $grupos]);
    }


    public function store(Request $request)
    {
        $grupo = Grupo::findOrFail($request['grupo_s_id']);

        $suministro = new Suministro();
        $suministro -> nombre = $request['nombre'];
        $suministro -> marca = $request['marca'];
        $suministro -> codigo = $grupo-> linea_s_id.'-'.$grupo->id;
        $suministro -> stock_minimo = $request['stock_minimo'];
        $suministro -> stock_maximo = $request['stock_maximo'];
        $suministro -> stock = 0;
        $suministro -> grupo_s_id = $grupo -> id;
        $suministro -> unidad_medida_id = $request['unidad_medida_id'];
        $suministro -> descripcion = $request['descripcion'];
        $suministro -> visible = true;
        if ($suministro -> save()){
            $suministro -> codigo = $grupo-> linea_s_id.'-'.$grupo->id.'-'.$suministro->id;
            $suministro -> save();
            Bitacora::registrar_accion(Tablas::$suministro, 'Creó el suministro con ID: '.$suministro -> id);
        }

        return redirect('sum/suministros');
    }


    public function edit($id)
    {
        $medidas = UnidadMedida::where('visible', '=', true)->get();
        $grupos = DB::table('grupo_s')
            ->join('linea_s','grupo_s.linea_s_id','=', 'linea_s.id')
            ->where('grupo_s.visible','=', true)
            ->select('grupo_s.id', 'grupo_s.nombre as grupo', 'linea_s.nombre as linea', 'grupo_s.linea_s_id')
            ->orderBy('grupo_s.linea_s_id', 'asc')
            ->orderBy('grupo_s.id', 'asc')
            ->get();

        return view('suministros.suministros.edit',['suministro' => Suministro::findOrFail($id),'medidas' => $medidas, 'grupos' => $grupos]);
    }

    public function update(Request $request, $id)
    {
        $suministro = Suministro::findOrFail($id);
        $suministro -> nombre = $request['nombre'];
        $suministro -> marca = $request['marca'];
        $suministro -> stock_minimo = $request['stock_minimo'];
        $suministro -> stock_maximo = $request['stock_maximo'];
        $suministro -> grupo_s_id = $request['grupo_s_id'];
        $suministro -> unidad_medida_id = $request['unidad_medida_id'];
        $suministro -> descripcion = $request['descripcion'];

        $grupo = Grupo::findOrFail($request['grupo_s_id']);
        $suministro -> codigo = $grupo-> linea_s_id.'-'.$grupo->id.'-'.$suministro->id;
        if ($suministro -> save()){
            Bitacora::registrar_accion(Tablas::$suministro, 'Editó el suministro con ID: '.$id);
        }

        return redirect('sum/suministros');
    }


    public function destroy($id)
    {
        $suministro = Suministro::findOrFail($id);
        $suministro -> visible = false;
        if ($suministro -> save()){
            Bitacora::registrar_accion(Tablas::$suministro, 'Eliminó el suministro con ID: '.$id);
        }
        return redirect('sum/suministros');
    }
}
