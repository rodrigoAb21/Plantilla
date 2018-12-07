<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleTraslado extends Model
{
    protected $table = 'detalle_tras';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'activo_fijo_id',
        'traslado_id',
    ];
}
