<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleAsignacion extends Model
{
    protected $table = 'detalle_asig';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'activo_fijo_id',
        'asignacion_id',
    ];
}
