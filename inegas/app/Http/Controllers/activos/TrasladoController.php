<?php

namespace App\Http\Controllers\activos;

use App\ActivoFijo;
use App\Bitacora;
use App\DetalleTraslado;
use App\Tablas;
use App\Traslado;
use App\Ubicacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TrasladoController extends Controller
{
    public function index(Request $request){
        $traslados = DB::table('traslado')
            ->join('ubicacion', 'traslado.ubicacion_id','=','ubicacion.id')
            ->where('ubicacion.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->select('traslado.id','traslado.fecha', 'ubicacion.nombre as ubicacion')
            ->orderBy('traslado.id','desc')
            ->paginate(10);

        return view('activos.mov-activos.traslados.index',['traslados' => $traslados, 'busqueda' => trim($request['busqueda'])]);
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



        return view('activos.mov-activos.traslados.create',['ubicaciones' => Ubicacion::where('visible','=', true)->get(), 'activos' => $activos]);
    }

    public function store(Request $request){

        try {
            DB::beginTransaction();

            $traslado = new Traslado();
            $traslado -> fecha = $request['fecha'];
            $traslado -> observacion = $request['observacion'];
            $traslado -> ubicacion_id = $request['ubicacion_id'];
            if ($traslado -> save()){

                $act_ids = $request['activo_fijo_idT'];
                $cont = 0;

                while ($cont < count($act_ids)) {
                    $detalle = new DetalleTraslado();
                    $detalle -> activo_fijo_id = $act_ids[$cont];
                    $detalle -> traslado_id = $traslado -> id;
                    $detalle -> save();


                    $activo = ActivoFijo::findOrFail($act_ids[$cont]);
                    $activo -> disponibilidad = 'Trasladado';
                    $activo -> save();

                    $cont++;
                }

                DB::commit();

                Bitacora::registrar_accion(Tablas::$traslado, 'Realizo el traslado con ID:'.$traslado->id);
            }

        }catch (Exception $e){
            DB::rollback();
        }

        return redirect('/act/mov-activos/traslados');
    }

    public function show($id){
        $traslado = DB::table('traslado')
            ->join('ubicacion', 'traslado.ubicacion_id','=','ubicacion.id')
            ->where('traslado.id','=', $id)
            ->select('traslado.id','traslado.fecha', 'traslado.estado', 'ubicacion.nombre as ubicacion')
            ->first();

        return view('activos.mov-activos.traslados.show',['traslado' => $traslado]);
    }

}
