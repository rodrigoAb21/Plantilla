<?php

namespace App\Http\Controllers\activos;

use App\ActivoFijo;
use App\Asignacion;
use App\Bitacora;
use App\DetalleAsignacion;
use App\Tablas;
use App\Visitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use LaravelQRCode\Facades\QRCode;

class AsignacionController extends Controller
{
    public function index(Request $request){
        $asignaciones = DB::table('asignacion')
            ->join('trabajador','asignacion.trabajador_id','=','trabajador.id')
            ->orderBy('asignacion.id','desc')
            ->where('trabajador.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->select('asignacion.id', 'asignacion.fecha', 'asignacion.observacion', 'trabajador.nombre as responsable')
            ->paginate(10);

        Visitas::incrementar(7);

        return view('activos.mov-activos.asignaciones.index',['asignaciones' => $asignaciones, 'busqueda' => trim($request['busqueda']),'visitas' => Visitas::findOrFail(7)]);
    }

    public function create(){
        $activos = DB::table('activo_fijo')
            ->join('grupo_a','activo_fijo.grupo_a_id','=','grupo_a.id')
            ->join('linea_a','grupo_a.linea_a_id','=','linea_a.id')
            ->select('activo_fijo.id', 'activo_fijo.codigo', 'grupo_a.nombre as grupo', 'linea_a.nombre as linea', 'activo_fijo.serie')
            ->where('activo_fijo.disponibilidad', '!=', 'Baja')
            ->orderBy('linea_a.id', 'asc')
            ->orderBy('grupo_a.id', 'asc')
            ->get();

        $trabajadores = DB::table('trabajador')
            ->join('ubicacion','trabajador.ubicacion_id','=','ubicacion.id')
            ->where('trabajador.visible','=', true)
            ->select('trabajador.id', 'trabajador.nombre', 'trabajador.cargo', 'ubicacion.nombre as ubicacion')
            ->orderBy('ubicacion.nombre','asc')
            ->get();



        return view('activos.mov-activos.asignaciones.create',['activos' => $activos, 'trabajadores' => $trabajadores]);
    }

    public function store(Request $request){

        try {
            DB::beginTransaction();

            $asignacion = new Asignacion();
            $asignacion -> fecha = $request['fecha'];
            $asignacion -> observacion = $request['observacion'];
            $asignacion -> trabajador_id = $request['trabajador_id'];
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
        $asignacion = DB::table('asignacion')
            ->where('asignacion.id', '=', $id)
            ->join('trabajador','asignacion.trabajador_id','=','trabajador.id')
            ->join('ubicacion','trabajador.ubicacion_id','=','ubicacion.id')
            ->select('asignacion.id', 'asignacion.fecha', 'asignacion.observacion', 'trabajador.nombre as responsable', 'trabajador.cargo', 'ubicacion.nombre as ubicacion')
            ->first();
        
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
