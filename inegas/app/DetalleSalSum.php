<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleSalSum extends Model
{
    protected $table = 'detalle_s_s';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'cantidad',
        'suministro_id',
        'salida_s_id',
    ];
}
