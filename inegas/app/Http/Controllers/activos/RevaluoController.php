<?php

namespace App\Http\Controllers\activos;

use App\ActivoFijo;
use App\Bitacora;
use App\Revaluo;
use App\Tablas;
use App\Visitas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RevaluoController extends Controller
{
    public function index(Request $request)
    {
        $revaluos = DB::table('revaluo')
            ->join('activo_fijo','revaluo.activo_fijo_id','=','activo_fijo.id')
            ->where('revaluo.estado', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('revaluo.tipo', 'LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('activo_fijo.codigo', 'LIKE','%'.trim($request['busqueda']).'%')
            ->select('revaluo.id', 'revaluo.fecha', 'activo_fijo.codigo','revaluo.estado', 'revaluo.tipo')
            ->orderBy('revaluo.id','desc')
            ->paginate(10);

        return view('activos.revaluos.index',['revaluos' => $revaluos, 'busqueda' => trim($request['busqueda'])]);
    }


    public function create()
    {
        $activos = DB::table('activo_fijo')
            ->join('grupo_a', 'activo_fijo.grupo_a_id','=','grupo_a.id')
            ->select('activo_fijo.id','activo_fijo.serie', 'activo_fijo.codigo', 'activo_fijo.costo_actual', 'grupo_a.nombre as grupo','grupo_a.id as grupo_id')
            ->orderBy('grupo_a.id', 'asc')
            ->get();
        return view('activos.revaluos.create', ['activos' => $activos]);
    }


    public function store(Request $request)
    {
        $revaluo = new Revaluo();
        $revaluo -> fecha = Carbon::now('America/La_Paz');
        $revaluo -> monto = $request['monto'];
        $revaluo -> tipo = ($request['monto'] > 0) ? 'Incremento' : 'Decremento';
        $revaluo -> motivo = $request['motivo'];
        $revaluo -> estado = 'Realizado';
        $revaluo -> activo_fijo_id = $request['activo_fijo_id'];
        if ($revaluo -> save()){
            $activo = ActivoFijo::findOrFail($request['activo_fijo_id']);
            $activo -> costo_actual = $activo -> costo_actual + $revaluo -> monto;
            $activo ->save();

            Bitacora::registrar_accion(Tablas::$revaluo, 'Realizó el revaluo: '.$revaluo -> id.' del activo con código: '.$activo -> codigo);
        }
        return redirect('act/revaluos');
    }


    public function show($id)
    {
        $revaluo = DB::table('revaluo')
            ->join('activo_fijo', 'revaluo.activo_fijo_id', '=', 'activo_fijo.id')
            ->join('grupo_a', 'activo_fijo.grupo_a_id','=','grupo_a.id')
            ->where('revaluo.id', '=', $id)
            ->select('revaluo.id', 'revaluo.fecha', 'revaluo.monto', 'revaluo.tipo', 'revaluo.motivo', 'revaluo.estado', 'activo_fijo.codigo', 'activo_fijo.costo_actual', 'grupo_a.nombre as grupo')
            ->first();
        return view('activos.revaluos.show', ['revaluo' => $revaluo]);
    }


    public function destroy($id)
    {
        $revaluo = Revaluo::findOrFail($id);
        $revaluo -> estado = 'Anulado';
        if ($revaluo -> save()){
            $activo = ActivoFijo::findOrFail($revaluo -> activo_fijo_id);
            $activo -> costo_actual = $activo -> costo_actual - $revaluo -> monto;
            $activo -> save();

            Bitacora::registrar_accion(Tablas::$revaluo, 'Anuló el revaluo: '.$id.' del activo con código: '.$activo -> codigo);
        }

        return redirect('act/revaluos');
    }
}
