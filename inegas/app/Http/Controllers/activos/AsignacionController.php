<?php

namespace App\Http\Controllers\activos;

use App\ActivoFijo;
use App\Asignacion;
use App\Bitacora;
use App\DetalleAsignacion;
use App\Http\Requests\activos\AsignacionRequest;
use App\Tablas;
use App\Visitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use LaravelQRCode\Facades\QRCode;

class AsignacionController extends Controller
{
    public function index(Request $request){
        $asignaciones = DB::table('asignacion')
            ->join('trabajador','asignacion.trabajador_id','=','trabajador.id')
            ->join('ubicacion','asignacion.ubicacion_id','=','ubicacion.id')
            ->join('area','ubicacion.area_id','=','area.id')
            ->orderBy('asignacion.id','desc')
            ->where('trabajador.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('ubicacion.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->select('asignacion.id', 'asignacion.fecha', 'asignacion.observacion', 'trabajador.nombre as responsable', 'ubicacion.nombre as ubicacion', 'area.nombre as area')
            ->paginate(10);

        return view('activos.mov-activos.asignaciones.index',['asignaciones' => $asignaciones, 'busqueda' => trim($request['busqueda'])]);
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
            ->join('area','area.id','=','trabajador.area_id')
            ->join('ubicacion','ubicacion.area_id','=','area.id')
            ->where('trabajador.visible','=', true)
            ->select('trabajador.id as trabajador_id', 'trabajador.nombre', 'trabajador.cargo', 'ubicacion.nombre as ubicacion', 'area.nombre as area', 'ubicacion.id as ubicacion_id')
            ->orderBy('ubicacion.nombre','asc')
            ->get();



        return view('activos.mov-activos.asignaciones.create',['activos' => $activos, 'trabajadores' => $trabajadores]);
    }

    public function store(AsignacionRequest $request){

        try {
            DB::beginTransaction();

            $asignacion = new Asignacion();
            $asignacion -> fecha = $request['fecha'];
            $asignacion -> observacion = $request['observacion'];
            $asignacion -> trabajador_id = $request['trabajador_id'];
            $asignacion -> ubicacion_id = $request['ubicacion_id'];
            $asignacion -> user_id = Auth::user() -> id;

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
                    $activo -> trabajador_id = $request['trabajador_id'];
                    $activo -> ubicacion_id = $request['ubicacion_id'];
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
            ->join('area','trabajador.area_id','=','area.id')
            ->join('ubicacion','area.id','=','ubicacion.area_id')
            ->select('asignacion.id', 'asignacion.fecha', 'asignacion.observacion', 'trabajador.nombre as responsable', 'trabajador.cargo', 'ubicacion.nombre as ubicacion', 'area.nombre as area')
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
