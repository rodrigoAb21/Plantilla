<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleEstado extends Model
{
    protected $table = 'detalle_estado';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'fecha',
        'motivo',
        'activo_fijo_id',
        'estado_id',
    ];
}
