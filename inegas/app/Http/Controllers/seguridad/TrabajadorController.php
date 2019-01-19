<?php

namespace App\Http\Controllers\seguridad;

use App\Area;
use App\Bitacora;
use App\Tablas;
use App\Trabajador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TrabajadorController extends Controller
{
    public function index(Request $request)
    {
        $trabajadores = DB::table('trabajador')
            ->join('area', 'trabajador.area_id','=','area.id')
            ->where(function ($query) use ($request) {
                $query ->where('trabajador.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
                    ->where('trabajador.visible', '=', true);
            })
            ->orWhere(function ($query) use ($request) {
                $query ->where('area.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
                    ->where('trabajador.visible', '=', true);
            })
            ->orWhere(function ($query) use ($request) {
                $query ->where('trabajador.cargo', 'LIKE','%'.trim($request['busqueda']).'%')
                    ->where('trabajador.visible', '=', true);
            })
            ->select('trabajador.id', 'trabajador.nombre','trabajador.cargo', 'trabajador.area_id', 'area.nombre as area')
            ->orderBy('trabajador.area_id', 'asc')
            ->paginate(5);

        return view('seguridad.trabajadores.index', ['trabajadores' => $trabajadores, 'busqueda' => trim($request['busqueda'])]);
    }


    public function create()
    {
        $areas = Area::where('visible','=', true)->get();
        return view('seguridad.trabajadores.create',['areas' => $areas]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'cargo' => 'required|max:255',
            'area_id' => 'required',
        ]);

        $trabajador = new Trabajador();
        $trabajador -> nombre = $request['nombre'];
        $trabajador -> cargo = $request['cargo'];
        $trabajador -> area_id = $request['area_id'];
        $trabajador -> visible = true;
        if ($trabajador -> save()){
            Bitacora::registrar_accion(Tablas::$trabajador, 'Creó al trabajador con ID:'.$trabajador->id);
        }

        return redirect('seg/trabajadores');
    }


    public function edit(Request $request, $id)
    {
        $areas = Area::where('visible','=', true)->get();
        return view('seguridad.trabajadores.edit', ['trabajador' => Trabajador::findOrFail($id), 'areas' => $areas, 'busqueda' => trim($request['busqueda'])]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'cargo' => 'required|max:255',
            'area_id' => 'required',
        ]);

        $trabajador = Trabajador::findOrFail($id);
        $trabajador -> nombre = $request['nombre'];
        $trabajador -> cargo = $request['cargo'];
        $trabajador -> area_id = $request['area_id'];
        if ($trabajador -> save()){
            Bitacora::registrar_accion(Tablas::$trabajador, 'Editó al trabajador con ID:'.$trabajador->id);
        }

        return redirect('seg/trabajadores');
    }


    public function destroy($id)
    {
        $trabajador = Trabajador::findOrFail($id);
        $trabajador -> visible = false;
        if ($trabajador -> save()){
            Bitacora::registrar_accion(Tablas::$trabajador, 'Eliminó al trabajador con ID:'.$trabajador->id);
        }

        return redirect('seg/trabajadores');
    }



}
