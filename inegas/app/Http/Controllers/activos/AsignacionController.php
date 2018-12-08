<?php

namespace App\Http\Controllers\activos;

use App\ActivoFijo;
use App\Asignacion;
use App\Bitacora;
use App\DetalleAsignacion;
use App\Tablas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AsignacionController extends Controller
{
    public function index(Request $request){
        $asignaciones = Asignacion::orderBy('asignacion.id','desc')
            ->where('responsable', 'LIKE','%'.trim($request['busqueda']).'%')
            ->paginate(10);

        return view('activos.mov-activos.asignaciones.index',['asignaciones' => $asignaciones, 'busqueda' => trim($request['busqueda'])]);
    }

    public function create(){
        $activos = DB::table('activo_fijo')
            ->join('grupo_a','activo_fijo.grupo_a_id','=','grupo_a.id')
            ->join('linea_a','grupo_a.linea_a_id','=','linea_a.id')
            ->select('activo_fijo.id', 'activo_fijo.codigo', 'grupo_a.nombre as grupo', 'linea_a.nombre as linea')
            ->where('activo_fijo.disponibilidad', '!=', 'Baja')
            ->orderBy('linea_a.id', 'asc')
            ->orderBy('grupo_a.id', 'asc')
            ->get();



        return view('activos.mov-activos.asignaciones.create',['activos' => $activos]);
    }

    public function store(Request $request){

        try {
            DB::beginTransaction();

            $asignacion = new Asignacion();
            $asignacion -> fecha = $request['fecha'];
            $asignacion -> observacion = $request['observacion'];
            $asignacion -> responsable = $request['responsable'];
            if ($asignacion -> save()){

                $act_ids = $request['activo_fijo_idT'];
                $cont = 0;

                while ($cont < count($act_ids)) {
                    $detalle = new DetalleAsignacion();
                    $detalle -> activo_fijo_id = $act_ids[$cont];
                    $detalle -> asignacion_id = $asignacion -> id;
                    $detalle -> save();


                    $activo = ActivoFijo::findOrFail($act_ids[$cont]);
                    $activo -> disponibilidad = 'Asignado';
                    $activo -> save();

                    $cont++;
                }

                DB::commit();

                Bitacora::registrar_accion(Tablas::$asignacion, 'Realizo el asignacion con ID:'.$asignacion->id);
            }

        }catch (Exception $e){
            DB::rollback();
        }

        return redirect('/act/mov-activos/asignaciones');
    }

    public function show($id){
        $asignacion = Asignacion::findOrFail($id);
        
        $activos = DB::table('activo_fijo')
            ->join('grupo_a','activo_fijo.grupo_a_id','=','grupo_a.id')
            ->join('linea_a','grupo_a.linea_a_id','=','linea_a.id')
            ->join('detalle_asig','activo_fijo.id','=','detalle_asig.activo_fijo_id')
            ->where('detalle_asig.asignacion_id', '=', $id)
            ->select('activo_fijo.id', 'activo_fijo.codigo', 'grupo_a.nombre as grupo', 'linea_a.nombre as linea')
            ->where('activo_fijo.disponibilidad', '!=', 'Baja')
            ->orderBy('linea_a.id', 'asc')
            ->orderBy('grupo_a.id', 'asc')
            ->get();

        return view('activos.mov-activos.asignaciones.show',['asignacion' => $asignacion, 'activos' => $activos]);

    }
}
