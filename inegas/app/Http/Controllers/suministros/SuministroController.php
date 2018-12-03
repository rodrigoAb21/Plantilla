<?php

namespace App\Http\Controllers\suministros;

use App\Bitacora;
use App\Grupo;
use App\Suministro;
use App\Tablas;
use App\UnidadMedida;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SuministroController extends Controller
{
    public function index(Request $request)
    {
        $suministros = DB::table('suministro')
            ->join('grupo_s','suministro.grupo_s_id','=','grupo_s.id')
            ->join('unidad_medida','suministro.unidad_medida_id','=','unidad_medida.id')
            ->where('suministro.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('suministro.visible', '=', true)
            ->select('suministro.id','suministro.nombre', 'suministro.stockMinimo','suministro.stockMaximo','suministro.stock','suministro.marca','suministro.descripcion','grupo_s.nombre as grupo','unidad_medida.nombre as medida')
            ->orderBy('suministro.id', 'asc')
            ->paginate(5);

        return view('suministros.suministros.index', ['suministros' => $suministros, 'busqueda' => trim($request['busqueda'])]);
    }


    public function create()
    {
        $medidas = UnidadMedida::where('visible', '=', true)->get();
        $grupos = Grupo::where('visible', '=', true)->get();
        return view('suministros.suministros.create',['medidas' => $medidas, 'grupos' => $grupos]);
    }


    public function store(Request $request)
    {
        $suministro = new Suministro();
        $suministro -> nombre = $request['nombre'];
        $suministro -> marca = $request['marca'];
        $suministro -> stockMinimo = $request['stockMinimo'];
        $suministro -> stockMaximo = $request['stockMaximo'];
        $suministro -> stock = $request['stock'];
        $suministro -> grupo_s_id = $request['grupo_s_id'];
        $suministro -> unidad_medida_id = $request['unidad_medida_id'];
        $suministro -> descripcion = $request['descripcion'];
        $suministro -> visible = true;
        if ($suministro -> save()){
            Bitacora::registrar_accion(Tablas::$suministro, 'Creó el suministro con ID: '.$suministro -> id);
        }

        return redirect('sum/suministros');
    }


    public function edit($id)
    {
        $medidas = UnidadMedida::where('visible', '=', true)->get();
        $grupos = Grupo::where('visible', '=', true)->get();

        return view('suministros.suministros.edit',['suministro' => Suministro::findOrFail($id),'medidas' => $medidas, 'grupos' => $grupos]);
    }

    public function update(Request $request, $id)
    {
        $suministro = Suministro::findOrFail($id);
        $suministro -> nombre = $request['nombre'];
        $suministro -> marca = $request['marca'];
        $suministro -> stockMinimo = $request['stockMinimo'];
        $suministro -> stockMaximo = $request['stockMaximo'];
        $suministro -> stock = $request['stock'];
        $suministro -> grupo_s_id = $request['grupo_s_id'];
        $suministro -> unidad_medida_id = $request['unidad_medida_id'];
        $suministro -> descripcion = $request['descripcion'];
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
