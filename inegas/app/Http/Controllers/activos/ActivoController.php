<?php

namespace App\Http\Controllers\activos;

use App\ActivoFijo;
use App\Bitacora;
use App\DetalleEstado;
use App\Estado;
use App\Tablas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ActivoController extends Controller
{
    public function index(Request $request)
    {
        $activos = DB::table('activo_fijo')
            ->join('grupo_a', 'activo_fijo.grupo_a_id', '=', 'grupo_a.id')
            ->join('linea_a', 'grupo_a.linea_a_id', '=', 'linea_a.id')
            ->select('activo_fijo.id', 'activo_fijo.codigo','activo_fijo.serie', 'grupo_a.nombre as grupo', 'linea_a.nombre as linea')
            ->orderBy('activo_fijo.codigo', 'asc')
            ->paginate(10);
        return view('activos.activos.index', ['activos' => $activos]);
    }


    public function edit($id)
    {
        return view('activos.activos.edit', ['activo' => ActivoFijo::findOrFail($id)]);
    }


    public function update(Request $request, $id)
    {
        $activo = ActivoFijo::findOrFail($id);
        if (Input::hasFile('foto')) {
            $file = Input::file('foto');
            $file->move(public_path() . '/img/activos/activos/', $file->getClientOriginalName());
            $activo -> foto = $file->getClientOriginalName();
        }
        $activo -> caracteristicas = $request['caracteristicas'];
        if($activo -> save()){
            Bitacora::registrar_accion(Tablas::$activo, 'Editó el activo fijo con el ID: '.$id);
        }

        return redirect('act/activos');
    }

    public function show($id)
    {
        $activo = DB::table('activo_fijo')
            ->join('grupo_a', 'activo_fijo.grupo_a_id', '=', 'grupo_a.id')
            ->join('linea_a', 'grupo_a.linea_a_id', '=', 'linea_a.id')
            ->where('activo_fijo.id', '=', $id)
            ->select('activo_fijo.id', 'activo_fijo.marca', 'activo_fijo.modelo', 'activo_fijo.color', 'activo_fijo.foto','activo_fijo.codigo', 'activo_fijo.caracteristicas', 'activo_fijo.serie', 'activo_fijo.costo_actual', 'grupo_a.nombre as grupo', 'linea_a.nombre as linea')
            ->orderBy('activo_fijo.id', 'asc')
            ->get();
        return redirect('act/activos');
    }

    public function destroy($id)
    {
        return redirect('act/activos');
    }

    public function estados(Request $request, $id){
        $estados = DB::table('estado')
            ->where('estado.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('detalle_estado.activo_fijo_id', '=', $id)
            ->where('detalle_estado.visible', '=', true)
            ->join('detalle_estado', 'estado.id', '=', 'detalle_estado.estado_id')
            ->select('detalle_estado.id','detalle_estado.activo_fijo_id', 'detalle_estado.fecha','detalle_estado.motivo', 'estado.nombre')
            ->orderBy('detalle_estado.id', 'desc')
            ->paginate(10);
        return view('activos.activos.estados.index', ['estados' => $estados, 'busqueda' => trim($request['busqueda']), 'activo' => ActivoFijo::findOrFail($id)]);
    }

    public function asignar_estado($id){
        $estados = Estado::where('visible', '=', true)->get();
        return view('activos.activos.estados.create', ['estados' => $estados, 'activo' => ActivoFijo::findOrFail($id)]);
    }

    public function guardar_asignacion(Request $request, $id){
        $detalle = new DetalleEstado();
        $detalle -> fecha = Carbon::now('America/La_Paz');
        $detalle -> motivo = $request['motivo'];
        $detalle -> visible = true;
        $detalle -> estado_id = $request['estado_id'];
        $detalle -> activo_fijo_id = $id;
        if ($detalle -> save()){
            $activo = ActivoFijo::findOrFail($id);
            Bitacora::registrar_accion(Tablas::$activo, 'Asigno el estado: '.$detalle->estado_id.' para el activo con Codigo:'. $activo -> codigo);
        }

        return redirect('act/activos/'.$id.'/estados');
    }

    public function eliminar_asignacion($activo_id, $id){
        $detalle = DetalleEstado::findOrFail($id);
        $detalle -> visible = false;
        $detalle -> save();

        return redirect('/act/activos/'.$activo_id.'/estados');
    }


}
