<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Bitacora extends Model
{

    protected $table = 'bitacora';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'inicio'
    ];

    public static function ingreso(){
        $bitacora = new Bitacora();
        $bitacora -> user_id = Auth::user() -> id;
        $bitacora -> inicio = Carbon::now('America/La_Paz');
        if ($bitacora -> save()){
            Session::put('bitacora_id',$bitacora -> id);

            $accion = new Accion();
            $accion -> descripcion = 'Ha iniciado sesion.';
            $accion -> bitacora_id = $bitacora -> id;
            $accion -> fecha = Carbon::now('America/La_Paz');
            $accion -> tabla = 'Ninguno';
            $accion -> save();
        }
    }

    public static function registrar_accion($tabla, $descripcion){
        $accion = new Accion();
        $accion -> descripcion = $descripcion;
        $accion -> bitacora_id = Session::get('bitacora_id');
        $accion -> fecha = Carbon::now('America/La_Paz');
        $accion -> tabla = $tabla;
        $accion -> save();
    }

    public static function salida(){
        $accion = new Accion();
        $accion -> descripcion = 'Ha cerrado sesion.';
        $accion -> bitacora_id = Session::get('bitacora_id');
        $accion -> fecha = Carbon::now('America/La_Paz');
        $accion -> tabla = 'Ninguno';
        $accion -> save();
    }
}
