<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suministro extends Model
{
    protected $table = 'suministro';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'stockMinimo',
        'stockMaximo',
        'stock',
        'marca',
        'descripcion',
        'visible',
        'grupo_s_id',
        'unidad_medida_id',
    ];
}
