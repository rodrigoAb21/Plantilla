<?php

namespace App\Http\Controllers\seguridad;

use App\Bitacora;
use App\User;
use App\Visitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BitacoraController extends Controller
{

    public function index(Request $request)
    {
            $bitacoras = DB::table('bitacora')
                ->where('users.nombre','LIKE','%'.trim($request['busqueda']).'%')
                ->join('users','users.id','=','bitacora.user_id')
                ->select('bitacora.id', 'bitacora.inicio', 'users.nombre')
                ->orderBy('bitacora.id','asc')
                ->paginate(10);
            Visitas::incrementar(15);
            return view('seguridad.bitacora.index',['bitacoras' => $bitacoras, 'busqueda' => trim($request['busqueda']),'visitas' => Visitas::findOrFail(15)]);
    }

    public function show($id){
        $acciones = DB::table('accion')
            ->where('bitacora_id','=',$id)
            ->orderBy('accion.id','asc')
            ->paginate(10);

        $bitacora = Bitacora::findOrFail($id);
        $usuario = User::findOrFail($bitacora->user_id);

        return view('seguridad.bitacora.acciones',['acciones' => $acciones, 'usuario' => $usuario]);
    }

}
