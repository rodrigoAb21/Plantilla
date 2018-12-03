<?php

namespace App\Http\Controllers\seguridad;

use App\Bitacora;
use App\Tablas;
use App\Ubicacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UbicacionController extends Controller
{
    public function index(Request $request)
    {
        $ubicaciones = DB::table('ubicacion')
            ->where('nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('visible', '=', true)
            ->orderBy('id', 'asc')
            ->paginate(5);
        return view('seguridad.ubicaciones.index', ['ubicaciones' => $ubicaciones, 'busqueda' => trim($request['busqueda'])]);
    }


    public function create()
    {
        return view('seguridad.ubicaciones.create');
    }


    public function store(Request $request)
    {
        $ubi = new Ubicacion();
        $ubi -> nombre = $request['nombre'];
        $ubi -> visible = true;
        if ($ubi -> save()){
            Bitacora::registrar_accion(Tablas::$ubicacion, 'Creó la ubicación con ID:'.$ubi->id);
        }

        return redirect('seg/ubicaciones');
    }


    public function edit($id)
    {
        return view('seguridad.ubicaciones.edit', ['ubicacion' => Ubicacion::findOrFail($id)]);
    }


    public function update(Request $request, $id)
    {
        $ubi = Ubicacion::findOrFail($id);
        $ubi -> nombre = $request['nombre'];
        if ($ubi -> save()){
            Bitacora::registrar_accion(Tablas::$ubicacion, 'Editó la ubicación con ID:'.$ubi->id);
        }

        return redirect('seg/ubicaciones');
    }


    public function destroy($id)
    {
        $ubi = Ubicacion::findOrFail($id);
        $ubi -> visible = false;
        if ($ubi -> save()){
            Bitacora::registrar_accion(Tablas::$ubicacion, 'Eliminó la ubicación con ID:'.$ubi->id);
        }

        return redirect('seg/ubicaciones');
    }
}
