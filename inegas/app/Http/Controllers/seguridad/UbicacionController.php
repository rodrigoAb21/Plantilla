<?php

namespace App\Http\Controllers\seguridad;

use App\Bitacora;
use App\Tablas;
use App\Trabajador;
use App\Ubicacion;
use App\Visitas;
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
        Visitas::incrementar(14);
        return view('seguridad.ubicaciones.index', ['ubicaciones' => $ubicaciones, 'busqueda' => trim($request['busqueda']),'visitas' => Visitas::findOrFail(14)]);
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


    public function edit(Request $request, $id)
    {
        $trabajadores = DB::table('trabajador')
            ->where('nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('visible', '=', true)
            ->where('ubicacion_id','=',$id)
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('seguridad.ubicaciones.edit', ['ubicacion' => Ubicacion::findOrFail($id), 'trabajadores' => $trabajadores, 'busqueda' => trim($request['busqueda'])]);
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


    public function guardarTrabjador(Request $request, $id){
        $trabajador = new Trabajador();
        $trabajador -> nombre = $request['nombreT'];
        $trabajador -> cargo = $request['cargoT'];
        $trabajador -> visible = true;
        $trabajador -> ubicacion_id = $id;
        if ($trabajador ->save()){
            Bitacora::registrar_accion(Tablas::$trabajador, 'Registro al trabajador con ID: '.$trabajador->id);
        }

        return redirect('seg/ubicaciones/'.$id.'/edit');
    }

    public function actualizarTrabajador(Request $request, $idUbi, $idTrab){
        $trabajador = Trabajador::findOrFail($idTrab);
        $trabajador -> nombre = $request['nombreT'];
        $trabajador -> cargo = $request['cargoT'];
        if ($trabajador ->save()){
            Bitacora::registrar_accion(Tablas::$trabajador, 'Edito al trabajador con ID: '.$trabajador->id);
        }

        return redirect('seg/ubicaciones/'.$idUbi.'/edit');
    }

    public function eliminarTrabajador($idUbi, $idTrab){
        $trabajador = Trabajador::findOrFail($idTrab);
        $trabajador -> visible = false;
        if ($trabajador ->save()){
            Bitacora::registrar_accion(Tablas::$trabajador, 'Elimino al trabajador con ID: '.$trabajador->id);
        }

        return redirect('seg/ubicaciones/'.$idUbi.'/edit');
    }





}
