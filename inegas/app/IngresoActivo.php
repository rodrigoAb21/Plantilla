<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngresoActivo extends Model
{
    protected $table = 'ingreso_a';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'fecha_ingreso',
        'proveedor',
        'foto_factura',
        'nro_factura',
        'fecha_factura',
        'estado',
    ];
}
