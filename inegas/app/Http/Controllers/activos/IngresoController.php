<?php

namespace App\Http\Controllers\activos;

use App\Bitacora;
use App\IngresoActivo;
use App\Tablas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class IngresoController extends Controller
{
    public function index(Request $request)
    {
        $ingresos = DB::table('ingreso_a')
            ->where('nro_factura', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('proveedor', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('estado', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('activos.mov-activos.ingresos.index', ['ingresos' => $ingresos, 'busqueda' => trim($request['busqueda'])]);

    }


    public function create()
    {
        $grupos = DB::table('grupo_a')
            ->join('linea_a', 'grupo_a.linea_a_id', '=', 'linea_a.id')
            ->where('grupo_a.visible','=', true)
            ->select('grupo_a.id','grupo_a.nombre as grupo','linea_a.nombre as linea')
            ->get();
        return view('activos.mov-activos.ingresos.create', ['grupos' => $grupos]);
    }


    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
/*
            $ingreso = new IngresoActivo();
            $ingreso -> fecha_ingreso = $request['fecha_ingreso'];
            $ingreso -> fecha_factura = $request['fecha_factura'];
            $ingreso -> proveedor = $request['proveedor'];
            $ingreso -> estado = 'Realizado';
            $ingreso -> nro_factura = $request['nro_factura'];

            if (Input::hasFile('foto_factura')) {
                $file = Input::file('foto_factura');
                $file->move(public_path() . '/img/activos/ingresos/', $file->getClientOriginalName());
                $ingreso -> foto_factura = $file->getClientOriginalName();
            }

            $ingreso ->save();

            $grupos = $request['grupo_a_idT'];
            $grupos = $request['costoT'];
            $grupos = $request['marcaT'];
            $grupos = $request['serieT'];
            $grupos = $request['modeloT'];
            $grupos = $request['colorT'];
            $grupos = $request['caracteristicasT'];*/

            if (Input::hasFile('fotoT')) {
                $files = Input::file('fotoT');
                dd($files);
            }



        }catch (Exception $e){
            DB::rollback();
        }

        return redirect('act/mov-activos/ingresos');
    }


    public function show($id)
    {
        $detalles = DB::table('detalle_i_s')
            ->join('suministro','detalle_i_s.suministro_id','=','suministro.id')
            ->where('detalle_i_s.ingreso_s_id', '=', $id)
            ->select('detalle_i_s.id', 'detalle_i_s.cantidad', 'detalle_i_s.precio_unitario', 'suministro.nombre' )
            ->orderBy('detalle_i_s.id', 'asc')
            ->get();
        return view('activos.mov-activos.ingresos.show',['ingreso' => IngresoSuministro::findOrFail($id), 'detalles' => $detalles]);
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
