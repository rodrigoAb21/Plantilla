<?php

namespace App\Http\Controllers\suministros;

use App\Bitacora;
use App\DetalleIngSum;
use App\IngresoSuministro;
use App\Suministro;
use App\Tablas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class IngresoController extends Controller
{
    public function index(Request $request)
    {
        $ingresos = DB::table('ingreso_s')
            ->where('nro_factura', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('proveedor', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('estado', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('suministros.mov-suministros.ingresos.index', ['ingresos' => $ingresos, 'busqueda' => trim($request['busqueda'])]);

    }


    public function create()
    {
        $suministros = Suministro::
            where('visible','=', true)
            ->select('id','nombre')
            ->get();
        return view('suministros.mov-suministros.ingresos.create', ['suministros' => $suministros]);
    }


    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $ingreso = new IngresoSuministro();
            $ingreso -> fecha_ingreso = $request['fecha_ingreso'];
            $ingreso -> fecha_factura = $request['fecha_factura'];
            $ingreso -> proveedor = $request['proveedor'];
            $ingreso -> estado = 'Habilitado';
            $ingreso -> nro_factura = $request['nro_factura'];

            if (Input::hasFile('foto_factura')) {
                $file = Input::file('foto_factura');
                $file->move(public_path() . '/img/suministros/ingresos/' .$request->placa. '/', $file->getClientOriginalName());
                $ingreso -> foto_factura = $file->getClientOriginalName();
            }

            $ingreso ->save();

            $suministros = $request -> sumiT;
            $cantidades = $request -> cantT;
            $precios = $request -> precioT;

            $cont = 0;

            while ($cont < count($cantidades)) {
                $detalle = new DetalleIngSum();
                $detalle -> cantidad = $cantidades[$cont];
                $detalle -> precio_unitario = $precios[$cont];
                $detalle -> suministro_id = $suministros[$cont];
                $detalle -> ingreso_s_id = $ingreso -> id;
                $detalle -> save();

                // incrementar stock del suministro
                $s = Suministro::findOrFail($suministros[$cont]);
                $s -> stock = $s -> stock + $cantidades[$cont];
                $s -> save();

                $cont = $cont + 1;
            }

            DB::commit();

            Bitacora::registrar_accion(Tablas::$ingreso, 'Registró un nuevo ingreso con ID: '. $ingreso -> id. ' con '.$cont.' suministros.');

        }catch (Exception $e){
            DB::rollback();
        }

        return redirect('sum/mov-suministros/ingresos');
    }


    public function show($id)
    {
        $detalles = DB::table('detalle_i_s')
            ->join('suministro','detalle_i_s.suministro_id','=','suministro.id')
            ->where('detalle_i_s.ingreso_s_id', '=', $id)
            ->select('detalle_i_s.id', 'detalle_i_s.cantidad', 'detalle_i_s.precio_unitario', 'suministro.nombre' )
            ->orderBy('detalle_i_s.id', 'asc')
            ->get();
        return view('suministros.mov-suministros.ingresos.show',['ingreso' => IngresoSuministro::findOrFail($id), 'detalles' => $detalles]);
    }



    public function destroy($id)
    {
        $ingreso = IngresoSuministro::findOrFail($id);
        $ingreso -> estado = 'Deshabilitado';
        $ingreso -> save();

        // reviso los detalles que pertenecen al ingreso y descuento de su stock.
        $detalles = DetalleIngSum::where('ingreso_s_id', '=', $id)->get();

        foreach ($detalles as $detalle){
            $s = Suministro::findOrFail($detalle -> suministro_id);
            $s -> stock = $s -> stock - $detalle -> cantidad;
            $s -> save();
        }

        return redirect('sum/mov-suministros/ingresos');
    }

}
