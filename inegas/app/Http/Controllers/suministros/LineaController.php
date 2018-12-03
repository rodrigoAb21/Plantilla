<?php

namespace App\Http\Controllers\suministros;

use App\Bitacora;
use App\Grupo;
use App\Linea;
use App\Tablas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LineaController extends Controller
{
    public function index(Request $request)
    {
        $lineas = DB::table('linea_s')
            ->where('nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('visible', '=', true)
            ->orderBy('id', 'asc')
            ->paginate(5);
        return view('suministros.lineas.index',['lineas' => $lineas, 'busqueda' => trim($request['busqueda'])]);
    }


    public function create()
    {
        return view('suministros.lineas.create');
    }


    public function store(Request $request)
    {
        $linea = new Linea();
        $linea -> nombre = $request['nombre'];
        $linea -> visible = true;
        if ($linea -> save()){
            Bitacora::registrar_accion(Tablas::$linea, 'Creó la linea con ID: '.$linea -> id);
        }

        return redirect('sum/lineas');
    }


    public function edit(Request $request, $id)
    {
        $grupos = DB::table('grupo_s')
            ->where('nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('linea_s_id','=', $id)
            ->where('visible','=', true)
            ->orderBy('id', 'asc')
            ->get();
        return view('suministros.lineas.edit', ['linea' => Linea::findOrFail($id), 'grupos' => $grupos, 'busqueda' => trim($request['busqueda'])]);
    }


    public function update(Request $request, $id)
    {
        $linea = Linea::findOrFail($id);
        $linea -> nombre = $request['nombre'];
        if ($linea -> save()){
            Bitacora::registrar_accion(Tablas::$linea, 'Editó la linea con ID: '.$linea -> id);
        }

        return redirect('sum/lineas');
    }


    public function destroy($id)
    {
        $linea = Linea::findOrFail($id);
        $linea -> visible = false;
        if ($linea -> save()){
            Bitacora::registrar_accion(Tablas::$linea, 'Eliminó la linea con ID: '.$linea -> id.' junto a todos sus grupos');
        }

        $grupos = DB::table('grupo_s')
            ->where('linea_s_id','=', $id)
            ->get();

        foreach ($grupos as $grupo){
            $g = Grupo::findOrFail($grupo->id);
            $g -> visible = false;
            $g -> save();
        }

        return redirect('sum/lineas');
    }

    public function guardarGrupo(Request $request, $id){
        $grupo = new Grupo();
        $grupo -> nombre = $request['nombreGrupo'];
        $grupo -> visible = true;
        $grupo -> linea_s_id = $id;
        if ($grupo -> save()){
            Bitacora::registrar_accion(Tablas::$grupo, 'Creó el grupo con ID: '.$grupo -> id);
        }

        return redirect('sum/lineas/'.$id.'/edit');

    }

    public function actualizarGrupo(Request $request, $idLinea, $idGrupo){
        $grupo = Grupo::findOrFail($idGrupo);
        $grupo -> nombre = $request['nombreGrupo'];
        if ($grupo -> save()){
            Bitacora::registrar_accion(Tablas::$grupo, 'Editó el grupo con ID: '.$grupo -> id);
        }

        return redirect('sum/lineas/'.$idLinea.'/edit');
    }

    public function eliminarGrupo($idLinea, $idGrupo){
        $grupo = Grupo::findOrFail($idGrupo);
        $grupo -> visible = false;
        if ($grupo -> save()){
            Bitacora::registrar_accion(Tablas::$grupo, 'Eliminó el grupo con ID: '.$grupo -> id);
        }

        return redirect('sum/lineas/'.$idLinea.'/edit');
    }

}
