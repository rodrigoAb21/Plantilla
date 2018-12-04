<?php

namespace App\Http\Controllers\activos;

use App\Bitacora;
use App\GrupoA;
use App\Tablas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
{
    public function index(Request $request)
    {
        $grupos = DB::table('grupo_a')
            ->where('nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('visible', '=', true)
            ->orderBy('id', 'asc')
            ->paginate(10);
        return view('activos.grupos.index',['grupos' => $grupos, 'busqueda' => trim($request['busqueda'])]);
    }


    public function create()
    {
        return view('activos.grupos.create');
    }


    public function store(Request $request)
    {
        $grupo = new GrupoA();
        $grupo -> nombre = $request['nombre'];
        $grupo -> visible = true;
        if ($grupo -> save()){
            Bitacora::registrar_accion(Tablas::$grupo_a, 'Creó el grupo con ID: '.$grupo ->id);
        }

        return redirect('act/grupos');
    }


    public function edit($id)
    {
        return view('activos.grupos.edit', ['grupo' => GrupoA::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $grupo = GrupoA::findOrFail($id);
        $grupo -> nombre = $request['nombre'];
        if ($grupo -> save()){
            Bitacora::registrar_accion(Tablas::$grupo_a, 'Editó el grupo con ID: '.$grupo ->id);
        }

        return redirect('act/grupos');
    }


    public function destroy($id)
    {
        $grupo = GrupoA::findOrFail($id);
        $grupo -> visible = false;
        if ($grupo -> save()){
            Bitacora::registrar_accion(Tablas::$grupo_a, 'Eliminó el grupo con ID: '.$grupo ->id);
        }
        return redirect('act/grupos');
    }
}
