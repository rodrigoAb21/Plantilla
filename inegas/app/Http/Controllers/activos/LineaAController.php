<?php

namespace App\Http\Controllers\activos;

use App\Bitacora;
use App\GrupoA;
use App\LineaA;
use App\Tablas;
use App\Visitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LineaAController extends Controller
{
    public function index(Request $request)
    {
        $lineas = DB::table('linea_a')
            ->where('nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('visible', '=', true)
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('activos.lineas.index',['lineas' => $lineas, 'busqueda' => trim($request['busqueda'])]);
    }


    public function create()
    {
        return view('activos.lineas.create');
    }


    public function store(Request $request)
    {
        $linea = new LineaA();
        $linea -> nombre = $request['nombre'];
        $linea -> visible = true;
        if ($linea -> save()){
            Bitacora::registrar_accion(Tablas::$linea_a, 'Creó la linea con ID: '.$linea -> id);
        }

        return redirect('act/lineas');
    }


    public function edit(Request $request, $id)
    {
        $grupos = DB::table('grupo_a')
            ->where('nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('linea_a_id','=', $id)
            ->where('visible','=', true)
            ->orderBy('id', 'asc')
            ->get();
        return view('activos.lineas.edit', ['linea' => LineaA::findOrFail($id), 'grupos' => $grupos, 'busqueda' => trim($request['busqueda'])]);
    }


    public function update(Request $request, $id)
    {
        $linea = LineaA::findOrFail($id);
        $linea -> nombre = $request['nombre'];
        if ($linea -> save()){
            Bitacora::registrar_accion(Tablas::$linea_a, 'Editó la linea con ID: '.$linea -> id);
        }

        return redirect('act/lineas');
    }


    public function destroy($id)
    {
        $linea = LineaA::findOrFail($id);
        $linea -> visible = false;
        if ($linea -> save()){
            Bitacora::registrar_accion(Tablas::$linea_a, 'Eliminó la linea con ID: '.$linea -> id.' junto a todos sus grupos');
        }

        $grupos = DB::table('grupo_a')
            ->where('linea_a_id','=', $id)
            ->get();

        foreach ($grupos as $grupo){
            $g = GrupoA::findOrFail($grupo->id);
            $g -> visible = false;
            $g -> save();
        }

        return redirect('act/lineas');
    }

    public function guardarGrupo(Request $request, $id){
        $grupo = new GrupoA();
        $grupo -> nombre = $request['nombreGrupo'];
        $grupo -> visible = true;
        $grupo -> linea_a_id = $id;
        if ($grupo -> save()){
            Bitacora::registrar_accion(Tablas::$grupo_a, 'Creó el grupo con ID: '.$grupo -> id);
        }

        return redirect('act/lineas/'.$id.'/edit');

    }

    public function actualizarGrupo(Request $request, $idLinea, $idGrupo){
        $grupo = GrupoA::findOrFail($idGrupo);
        $grupo -> nombre = $request['nombreGrupo'];
        if ($grupo -> save()){
            Bitacora::registrar_accion(Tablas::$grupo_a, 'Editó el grupo con ID: '.$grupo -> id);
        }

        return redirect('act/lineas/'.$idLinea.'/edit');
    }

    public function eliminarGrupo($idLinea, $idGrupo){
        $grupo = GrupoA::findOrFail($idGrupo);
        $grupo -> visible = false;
        if ($grupo -> save()){
            Bitacora::registrar_accion(Tablas::$grupo_a, 'Eliminó el grupo con ID: '.$grupo -> id);
        }

        return redirect('act/lineas/'.$idLinea.'/edit');
    }
}
