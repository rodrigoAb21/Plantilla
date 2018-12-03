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
        'idUser',
        'fechaEntrada'
    ];

    public static function ingreso(){
        $bitacora = new Bitacora();
        $bitacora -> idUser = Auth::user() -> id;
        $bitacora -> fechaEntrada = Carbon::now('America/La_Paz');
        if ($bitacora -> save()){
            Session::put('idBitacora',$bitacora -> id);
        }
    }

    public static function crear($tabla, $tupla){
        $accion = new Accion();
        $accion -> accion = 'CREAR';
        $accion -> idBitacora = Session::get('idBitacora');
        $accion -> fecha = Carbon::now('America/La_Paz');
        $accion -> tabla = $tabla;
        $accion -> tupla = $tupla;
        $accion -> save();
    }

    public static function editar($tabla, $tupla){
        $accion = new Accion();
        $accion -> accion = 'EDITAR';
        $accion -> idBitacora = Session::get('idBitacora');
        $accion -> fecha = Carbon::now('America/La_Paz');
        $accion -> tabla = $tabla;
        $accion -> tupla = $tupla;
        $accion -> save();
    }

    public static function eliminar($tabla, $tupla){
        $accion = new Accion();
        $accion -> accion = 'ELIMINAR';
        $accion -> idBitacora = Session::get('idBitacora');
        $accion -> fecha = Carbon::now('America/La_Paz');
        $accion -> tabla = $tabla;
        $accion -> tupla = $tupla;
        $accion -> save();
    }
}
