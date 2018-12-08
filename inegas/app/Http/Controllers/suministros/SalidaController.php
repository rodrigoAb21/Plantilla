<?php

namespace App\Http\Controllers\suministros;

use App\Bitacora;
use App\DetalleSalSum;
use App\SalidaSuministro;
use App\Suministro;
use App\Tablas;
use App\Ubicacion;
use App\Visitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SalidaController extends Controller
{
    public function index(Request $request)
    {
        $salidas = DB::table('salida_s')
            ->join('ubicacion','salida_s.ubicacion_id','=','ubicacion.id')
            ->where('ubicacion.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('salida_s.recibe', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('salida_s.estado', 'LIKE','%'.trim($request['busqueda']).'%')
            ->select('salida_s.id', 'salida_s.recibe', 'salida_s.fecha', 'salida_s.estado', 'ubicacion.nombre as ubicacion')
            ->orderBy('salida_s.id', 'desc')
            ->paginate(10);

        Visitas::incrementar(12);

        return view('suministros.mov-suministros.salidas.index', ['salidas' => $salidas, 'busqueda' => trim($request['busqueda']),'visitas' => Visitas::findOrFail(12)]);

    }


    public function create()
    {
        $ubicaciones = Ubicacion::
            where('visible','=', true)
            ->orderBy('id','asc')
            ->get();

        $suministros = Suministro::
            where('visible','=', true)
            ->select('id','nombre','stock')
            ->orderBy('nombre','asc')
            ->get();

        return view('suministros.mov-suministros.salidas.create', ['ubicaciones' => $ubicaciones, 'suministros' => $suministros]);
    }


    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $sums = $request -> sumiT;
            $cans = $request -> cantT;

            $c = 0;

            $mal = 0;

            while ($c < count($cans)) {
                // incrementar stock del suministro
                $su = Suministro::findOrFail($sums[$c]);
                if ($su -> stock < $cans[$c]){
                    $mal = $mal + 1;
                }
                $c = $c + 1;
            }

            if ($mal == 0){
                $salida = new SalidaSuministro();
                $salida -> fecha = $request['fecha'];
                $salida -> recibe = $request['recibe'];
                $salida -> observacion = $request['observacion'];
                $salida -> estado = 'Realizado';
                $salida -> ubicacion_id = $request['ubicacion_id'];

                $salida ->save();

                $suministros = $request -> sumiT;
                $cantidades = $request -> cantT;

                $cont = 0;

                while ($cont < count($cantidades)) {
                    $detalle = new DetalleSalSum();
                    $detalle -> cantidad = $cantidades[$cont];
                    $detalle -> suministro_id = $suministros[$cont];
                    $detalle -> salida_s_id = $salida -> id;
                    $detalle -> save();

                    // incrementar stock del suministro
                    $s = Suministro::findOrFail($suministros[$cont]);
                    $s -> stock = $s -> stock - $cantidades[$cont];
                    $s -> save();

                    $cont = $cont + 1;
                }

                DB::commit();

                Bitacora::registrar_accion(Tablas::$salida, 'Registró una nueva salida de suministros de ID: '. $salida -> id. ' con '.$cont.' distintos suministros.');
            }else{
                DB::rollback();
            }

        }catch (Exception $e){
            DB::rollback();
        }

        return redirect('sum/mov-suministros/salidas');
    }


    public function show($id)
    {
        $salida = DB::table('salida_s')
            ->join('ubicacion', 'salida_s.ubicacion_id','=', 'ubicacion.id')
            ->select('salida_s.id', 'salida_s.recibe','salida_s.fecha', 'salida_s.observacion', 'salida_s.estado', 'ubicacion.nombre as ubicacion')
            ->first();

        $detalles = DB::table('detalle_s_s')
            ->join('suministro','detalle_s_s.suministro_id','=','suministro.id')
            ->where('detalle_s_s.salida_s_id', '=', $id)
            ->select('detalle_s_s.id', 'detalle_s_s.cantidad', 'suministro.nombre' )
            ->orderBy('detalle_s_s.id', 'asc')
            ->get();

        return view('suministros.mov-suministros.salidas.show',['salida' => $salida, 'detalles' => $detalles]);
    }

    public function destroy($id)
    {
        $salida = SalidaSuministro::findOrFail($id);
        if($salida -> estado != 'Anulado'){
            $salida -> estado = 'Anulado';
            $salida -> save();

            // reviso los detalles que pertenecen al ingreso y descuento de su stock.
            $detalles = DetalleSalSum::where('salida_s_id', '=', $id)->get();

            foreach ($detalles as $detalle){
                $s = Suministro::findOrFail($detalle -> suministro_id);
                $s -> stock = $s -> stock + $detalle -> cantidad;
                $s -> save();
            }

            Bitacora::registrar_accion(Tablas::$salida, 'Anuló un ingreso con ID: '. $id);
        }
        
        return redirect('sum/mov-suministros/salidas');
    }
}
