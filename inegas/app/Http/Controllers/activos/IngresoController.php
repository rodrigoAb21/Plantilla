<?php

namespace App\Http\Controllers\activos;

use App\ActivoFijo;
use App\Bitacora;
use App\DetalleEstado;
use App\Estado;
use App\GrupoA;
use App\Http\Requests\activos\IngresoRequest;
use App\IngresoActivo;
use App\Tablas;
use App\Ubicaciones;
use App\Visitas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class IngresoController extends Controller
{
    public function index(Request $request)
    {
        $ingresos1 = DB::table('ingreso_a')
            ->where('nro_factura', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('proveedor', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('estado', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orderBy('id', 'desc')
            ->paginate(10);


        return view('activos.mov-activos.ingresos.index', ['ingresos' => $ingresos1, 'busqueda' => trim($request['busqueda'])]);

    }


    public function create()
    {
        $grupos = DB::table('grupo_a')
            ->join('linea_a', 'grupo_a.linea_a_id', '=', 'linea_a.id')
            ->where('grupo_a.visible','=', true)
            ->select('grupo_a.id','grupo_a.nombre as grupo','linea_a.nombre as linea')
            ->get();

        $cont=0;
        $listU=[];
        $ubi= Ubicaciones::with('hijos')->get();
        foreach ($ubi as $u){
            if(count($u['relations']['hijos']) == 0){
                $listU[$cont]=$u['attributes'];
                $cont++;
            }
        }

        $estados = DB::table('estado')
            ->where('estado.visible','=',true)
            ->select('estado.nombre','estado.id')
            ->get();

        return view('activos.mov-activos.ingresos.create', ['ubicaciones' => $listU, 'grupos'=>$grupos,'estados'=>$estados]);
    }


    public function store(Request $request)
    {
//        dd($request);
        try {
            DB::beginTransaction();

            $ingreso = new IngresoActivo();
            $ingreso -> fecha_ingreso = $request['fecha_ingreso'];
            $ingreso -> fecha_factura = $request['fecha_factura'];
            $ingreso -> proveedor = $request['proveedor'];
            $ingreso -> estado = 'Realizado';
            $ingreso -> nro_factura = $request['nro_factura'];
            $ingreso -> user_id = Auth::user() -> id;

            if (Input::hasFile('foto_factura')) {
                $file = Input::file('foto_factura');
                $file->move(public_path() . '/img/activos/ingresos/', $file->getClientOriginalName());
                $ingreso -> foto_factura = $file->getClientOriginalName();
            }

            $ingreso ->save();

            $grupos = $request['grupo_a_idT'];
            $costos = $request['costoT'];
            $marcas = $request['marcaT'];
            $series = $request['serieT'];
            $modelos = $request['modeloT'];
            $colores = $request['colorT'];
            $caracteristicas = $request['caracteristicasT'];
            $ubicaciones = $request['ubicacionesT'];
            $estados = $request['estadosT'];

            $files = array();
            if (Input::hasFile('fotoT')) {
                $files = Input::file('fotoT');;
            }

            $cont = 0;

            while ($cont < count($grupos)) {
                $lg = GrupoA::findOrFail($grupos[$cont]);
                $activo = new ActivoFijo();

                $files[$cont]->move(public_path() . '/img/activos/activos/', $files[$cont]->getClientOriginalName());
                $activo -> foto = $files[$cont]->getClientOriginalName();

                $activo -> codigo = ''.$lg -> linea_a_id.' - '.$lg -> id;
                $activo -> disponibilidad = 'Disponible';
                $activo -> costo_actual = $costos[$cont];
                $activo -> costo_ingreso = $costos[$cont];
                $activo -> serie = $series[$cont];
                $activo -> marca = $marcas[$cont];
                $activo -> color = $colores[$cont];
                $activo -> modelo = $modelos[$cont];
                $activo -> caracteristicas = $caracteristicas[$cont];
                $activo -> visible = true;
                $activo -> grupo_a_id = $grupos[$cont];
                $activo -> ingreso_a_id = $ingreso -> id;

                $activo -> trabajador_id = 1;
                $activo -> ubicacion_id = $ubicaciones[$cont];



                if ($activo -> save()){
                    $activo -> codigo = ''.$lg -> linea_a_id.' - '.$lg -> id.' - '.$activo -> id;
                    $activo -> save();


                    $detalle = new DetalleEstado();
                    $detalle -> fecha = Carbon::now('America/La_Paz');
                    $detalle -> motivo = 'Estado de ingreso al sistema.';
                    $detalle -> visible = true;
                    $detalle -> activo_fijo_id = $activo -> id;
                    $detalle -> estado_id = $estados[$cont];
                    $detalle -> save();
                }

                $cont++;

            }

            DB::commit();

            Bitacora::registrar_accion(Tablas::$ingreso_act, 'Registró un nuevo ingreso con ID: '. $ingreso -> id. ' con '.$cont.' unidades de  activos fijos.');





        }catch (Exception $e){
            DB::rollback();
        }

        return redirect('act/mov-activos/ingresos');
    }


    public function show($id)
    {

        $activos = DB::table('activo_fijo')
            ->join('grupo_a', 'activo_fijo.grupo_a_id', '=', 'grupo_a.id')
            ->join('linea_a', 'grupo_a.linea_a_id', '=', 'linea_a.id')
            ->where('activo_fijo.ingreso_a_id', '=', $id)
            ->select('activo_fijo.id', 'activo_fijo.marca', 'activo_fijo.modelo', 'activo_fijo.color', 'activo_fijo.foto', 'activo_fijo.caracteristicas', 'activo_fijo.serie', 'activo_fijo.costo_ingreso', 'grupo_a.nombre as grupo', 'linea_a.nombre as linea','grupo_a.id as grupoId','linea_a.id as lineaId')
            ->orderBy('activo_fijo.id', 'asc')
            ->get();

        $ubicacion = DB::table('ubicaciones')
            ->join('activo_fijo','ubicaciones.id','=','activo_fijo.ubicacion_id')
            ->select('ubicaciones.nombre','activo_fijo.id')
            ->orderBy('activo_fijo.id','asc')
            ->get();

        $cont=1;
        foreach ($activos as $activo){
                $elem = DB::table('estado')
                ->join('detalle_estado','estado.id','=','detalle_estado.estado_id')
                ->where('detalle_estado.activo_fijo_id','=',$activo->id)
                ->orderBy('detalle_estado.fecha','desc')
                ->select('estado.id','estado.nombre')
                ->first();
                $estados[$cont]=($elem);
                $cont++;
        }

        return view('activos.mov-activos.ingresos.show',['ingreso' => IngresoActivo::findOrFail($id), 'activos' => $activos, 'ubicacion'=>$ubicacion,'estados'=>$estados]);
    }



    public function destroy($id)
    {
        $ingreso = IngresoActivo::findOrFail($id);
        if ($ingreso -> estado != 'Anulado'){
            $ingreso -> estado = 'Anulado';
            $ingreso -> save();

            /*// reviso los detalles que pertenecen al ingreso y descuento de su stock.
            $detalles = DetalleIngSum::where('ingreso_s_id', '=', $id)->get();

            foreach ($detalles as $detalle){
                $s = Suministro::findOrFail($detalle -> suministro_id);
                $s -> stock = $s -> stock - $detalle -> cantidad;
                $s -> save();
            }*/

//            Bitacora::registrar_accion(Tablas::$ingreso_act, 'Anuló un ingreso con ID: '. $id);
        }

        return redirect('act/mov-activos/ingresos');
    }
}
