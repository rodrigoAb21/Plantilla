<?php

namespace App\Http\Controllers\seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BitacoraController extends Controller
{

    public function index(Request $request)
    {
            $bitacora=DB::table('bitacora')->where('users.nombre','LIKE','%'.trim($request['busqueda']).'%')
                ->join('users','users.id','=','bitacora.idUser')
                ->select('bitacora.id', 'bitacora.fechaEntrada', 'users.nombre')
                ->orderBy('bitacora.id','asc')
                ->paginate(10);
            return view('seguridad.bitacora.index',['bitacora' => $bitacora, 'busqueda' => trim($request['busqueda'])]);
    }

    public function acciones($id){
        $acciones = DB::table('accion') -> where('idBitacora','=',$id)
            ->orderBy('accion.id','asc')
            ->get();

        return view('seguridad.bitacora.acciones',["acciones" => $acciones]);
    }

}
