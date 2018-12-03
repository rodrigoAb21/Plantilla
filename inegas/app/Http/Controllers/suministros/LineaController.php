<?php

namespace App\Http\Controllers\suministros;

use App\Grupo;
use App\Linea;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LineaController extends Controller
{
    public function index(Request $request)
    {
        $lineas = DB::table('linea')
            ->where('nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('visible', '=', true)
            ->orderBy('id', 'asc')
            ->paginate(5);
        return view('suministros.lineas.index',['lineas' => $lineas]);
    }


    public function create()
    {
        return view('suministros.lineas.create');
    }


    public function store(Request $request)
    {
        $unidad = new Linea();
        $unidad -> nombre = $request['nombre'];
        $unidad -> visible = true;
        $unidad -> save();

        return redirect('sum/lineas');
    }


    public function edit(Request $request, $id)
    {
        $grupos = DB::table('grupo_sum')
            ->where('nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('linea_id','=', $id)
            ->where('visible','=', true)
            ->orderBy('id', 'asc')
            ->get();
        return view('suministros.lineas.edit', ['linea' => Linea::findOrFail($id), 'grupos' => $grupos]);
    }

    public function guardarGrupo(Request $request, $id){
        $grupo = new Grupo();
        $grupo -> nombre = $request['nombreGrupo'];
        $grupo -> visible = true;
        $grupo -> linea_id = $id;
        $grupo -> save();

        return redirect('sum/lineas/'.$id.'/edit');

    }

    public function actualizarGrupo(Request $request, $idLinea, $idGrupo){
        $grupo = Grupo::findOrFail($idGrupo);
        $grupo -> nombre = $request['nombreGrupo'];
        $grupo -> save();

        return redirect('sum/lineas/'.$idLinea.'/edit');
    }

    public function eliminarGrupo($idLinea, $idGrupo){
        $grupo = Grupo::findOrFail($idGrupo);
        $grupo -> visible = false;
        $grupo -> save();

        return redirect('sum/lineas/'.$idLinea.'/edit');
    }


    public function update(Request $request, $id)
    {
        $unidad = Linea::findOrFail($id);
        $unidad -> nombre = $request['nombre'];
        $unidad -> save();

        return redirect('sum/lineas');
    }


    public function destroy($id)
    {
        $unidad = Linea::findOrFail($id);
        $unidad -> visible = false;
        $unidad -> save();

        $grupos = DB::table('grupo_sum')
            ->where('linea_id','=', $id)
            ->get();

        foreach ($grupos as $grupo){
            $g = Grupo::findOrFail($grupo->id);
            $g -> visible = false;
            $g -> save();
        }

        return redirect('sum/lineas');
    }
}
