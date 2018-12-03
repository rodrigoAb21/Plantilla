<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BitacoraController extends Controller
{
    public function index(Request $request)
    {
        if ($request){
            $query = trim($request -> get('searchText'));
            $bitacora=DB::table('bitacora')->where('users.nombre','LIKE','%'.$query.'%')
                ->join('users','users.id','=','bitacora.idUser')
                ->select('bitacora.id', 'bitacora.fechaEntrada', 'users.nombre')
                ->orderBy('bitacora.id','asc')
                ->paginate(25);
            return view('admin.bitacora.index',["bitacora" => $bitacora, "searchText" => $query]);
        }
    }

    public function acciones($id){
        $acciones = DB::table('accion') -> where('idBitacora','=',$id)
            ->orderBy('accion.id','asc')
            ->get();

        return view('admin.bitacora.acciones',["acciones" => $acciones]);
    }
    
    
    
    
    
    
    
    
}
