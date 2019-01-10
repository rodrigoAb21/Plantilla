<?php

namespace App\Http\Controllers\suministros;

use App\Bitacora;
use App\Http\Requests\suministro\UnidadMedidaRequest;
use App\Tablas;
use App\UnidadMedida;
use App\Visitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UnidadMedidaController extends Controller
{
    public function index(Request $request)
    {
        $unidades = DB::table('unidad_medida')
            ->where('nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('visible', '=', true)
            ->orderBy('id', 'asc')
            ->paginate(5);

        return view('suministros.medidas.index',['unidades' => $unidades, 'busqueda' => trim($request['busqueda'])]);
    }


    public function create()
    {
        return view('suministros.medidas.create');
    }


    public function store(UnidadMedidaRequest $request)
    {
        $unidad = new UnidadMedida();
        $unidad -> nombre = $request['nombre'];
        $unidad -> visible = true;
        if ($unidad -> save()){
            Bitacora::registrar_accion(Tablas::$unidad_medida, 'Creó la unidad de medida con ID: '.$unidad ->id);
        }

        return redirect('sum/presentaciones');
    }


    public function edit($id)
    {
        return view('suministros.medidas.edit', ['unidad' => UnidadMedida::findOrFail($id)]);
    }

    public function update(UnidadMedidaRequest $request, $id)
    {
        $unidad = UnidadMedida::findOrFail($id);
        $unidad -> nombre = $request['nombre'];
        if ($unidad -> save()){
            Bitacora::registrar_accion(Tablas::$unidad_medida, 'Editó la unidad de medida con ID: '.$unidad ->id);
        }

        return redirect('sum/presentaciones');
    }


    public function destroy($id)
    {
        $unidad = UnidadMedida::findOrFail($id);
        $unidad -> visible = false;
        if ($unidad -> save()){
            Bitacora::registrar_accion(Tablas::$unidad_medida, 'Eliminó la unidad de medida con ID: '.$unidad ->id);
        }
        return redirect('sum/presentaciones');
    }


}
