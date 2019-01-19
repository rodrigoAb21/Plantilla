<?php

namespace App\Http\Controllers\seguridad;

use App\Bitacora;
use App\Tablas;
use App\Ubicacion;
use App\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    public function index(Request $request)
    {
        $areas = DB::table('area')
            ->where('nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('visible', '=', true)
            ->orderBy('id', 'asc')
            ->paginate(5);

        return view('seguridad.areas.index', ['areas' => $areas, 'busqueda' => trim($request['busqueda'])]);
    }


    public function create()
    {
        return view('seguridad.areas.create');
    }


    public function store(Request $request)
    {

        $area = new Area();
        $area -> nombre = $request['nombre'];
        $area -> visible = true;
        if ($area -> save()){
            Bitacora::registrar_accion(Tablas::$area, 'Creó la area con ID:'.$area->id);
        }

        return redirect('seg/areas');
    }


    public function edit(Request $request, $id)
    {
        $ubicaciones = DB::table('ubicacion')
            ->where('nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('visible', '=', true)
            ->where('area_id','=',$id)
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('seguridad.areas.edit', ['area' => Area::findOrFail($id), 'ubicaciones' => $ubicaciones, 'busqueda' => trim($request['busqueda'])]);
    }


    public function update(Request $request, $id)
    {

        $area = Area::findOrFail($id);
        $area -> nombre = $request['nombre'];
        if ($area -> save()){
            Bitacora::registrar_accion(Tablas::$area, 'Editó el area con ID:'.$area->id);
        }

        return redirect('seg/areas');
    }


    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area -> visible = false;
        if ($area -> save()){
            Bitacora::registrar_accion(Tablas::$area, 'Eliminó el area con ID:'.$area->id);
        }

        return redirect('seg/areas');
    }


    public function guardarUbicacion(Request $request, $id){

        $this->validate($request, [
            'nombreT' => 'required|max:255',
        ]);

        $ubicacion = new Ubicacion();
        $ubicacion -> nombre = $request['nombreT'];
        $ubicacion -> visible = true;
        $ubicacion -> area_id = $id;
        if ($ubicacion ->save()){
            Bitacora::registrar_accion(Tablas::$ubicacion, 'Registro la ubicacion con ID: '.$ubicacion->id);
        }

        return redirect('seg/areas/'.$id.'/edit');
    }

    public function actualizarUbicacion(Request $request, $idArea, $idUbi){
        $ubicacion = Ubicacion::findOrFail($idUbi);
        $ubicacion -> nombre = $request['nombreT'];
        if ($ubicacion ->save()){
            Bitacora::registrar_accion(Tablas::$ubicacion, 'Edito la ubicacion con ID: '.$ubicacion->id);
        }

        return redirect('seg/areas/'.$idArea.'/edit');
    }

    public function eliminarUbicacion($idArea, $idUbi){
        $ubicacion = Ubicacion::findOrFail($idUbi);
        $ubicacion -> visible = false;
        if ($ubicacion ->save()){
            Bitacora::registrar_accion(Tablas::$ubicacion, 'Elimino la ubicacion con ID: '.$ubicacion->id);
        }

        return redirect('seg/areas/'.$idArea.'/edit');
    }





}
