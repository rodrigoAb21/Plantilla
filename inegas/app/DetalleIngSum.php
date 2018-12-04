<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleIngSum extends Model
{
    protected $table = 'detalle_i_s';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'cantidad',
        'precio_unitario',
        'suministro_id',
        'ingreso_s_id',
    ];
}
