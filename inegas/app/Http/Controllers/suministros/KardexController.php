<?php

namespace App\Http\Controllers\suministros;

use Illuminate\Http\Request;

class KardexController extends Controller
{
    public function index(Request $request)
    {
        $kardex = DB::table('kardex')
            ->where('ubicacion.nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->select('*')
            ->where('kardex.id_sum',$request['id_sum'])
            ->where('kardex.fecha','<=',$request['fecha_max'])
            ->where('kardex.fecha','=>',$request['fecha_min'])
            ->paginate(10);


    }
}
