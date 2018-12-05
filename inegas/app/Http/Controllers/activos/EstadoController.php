<?php

namespace App\Http\Controllers\activos;

use App\Bitacora;
use App\Estado;
use App\Tablas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EstadoController extends Controller
{
    public function index(Request $request)
    {
        $estados = DB::table('estado')
            ->where('nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('visible', '=', true)
            ->orderBy('id', 'asc')
            ->paginate(5);
        return view('activos.estados.index', ['estados' => $estados, 'busqueda' => trim($request['busqueda'])]);
    }


    public function create()
    {
        return view('activos.estados.create');
    }


    public function store(Request $request)
    {
        $estado = new Estado();
        $estado -> nombre = $request['nombre'];
        $estado -> visible = true;
        if ($estado -> save()){
            Bitacora::registrar_accion(Tablas::$estado, 'Creó el estado con ID:'.$estado->id);
        }

        return redirect('act/estados');
    }


    public function edit($id)
    {
        return view('activos.estados.edit', ['estado' => Estado::findOrFail($id)]);
    }


    public function update(Request $request, $id)
    {
        $estado = Estado::findOrFail($id);
        $estado -> nombre = $request['nombre'];
        if ($estado -> save()){
            Bitacora::registrar_accion(Tablas::$estado, 'Editó el estado con ID:'.$estado->id);
        }

        return redirect('act/estados');
    }


    public function destroy($id)
    {
        $estado = Estado::findOrFail($id);
        $estado -> visible = false;
        if ($estado -> save()){
            Bitacora::registrar_accion(Tablas::$estado, 'Eliminó el estado con ID:'.$estado->id);
        }

        return redirect('act/estados');
    }
}
