<?php

namespace App\Http\Controllers\activos;

use App\Ubicaciones;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UbicacionesController extends Controller
{
    public function index(Request $request)
    {
        $ubicaciones = Ubicaciones::with('hijos')->whereNull('u_id')->orderBy('id')->get();
        return view('activos.ubicaciones.index', ['ubicaciones' => $ubicaciones]);
    }

    public function create(Request $request, $sup){
//        dd($request);
        $ubicacion = new Ubicaciones;
        $ubicacion ->nombre = $request->nombre;
        if($sup>0){
            $ubicacion -> u_id = $sup;
        }
        $ubicacion->save();
        return redirect('act/ubicaciones');
    }

    public function eliminar(Request $request, $id){
        $ubicacion = Ubicaciones::findOrFail($id);
        $ubicacion->delete();

        return redirect('act/ubicaciones');
    }

    public function editar(Request $request, $id){
        $ubicacion = Ubicaciones::findOrFail($id);
        $ubicacion->nombre = $request->nombre;
        $ubicacion->update();
        return redirect('act/ubicaciones');
    }

}
