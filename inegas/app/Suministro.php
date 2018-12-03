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
        'stock_minimo',
        'stock_maximo',
        'stock',
        'marca',
        'codigo',
        'descripcion',
        'visible',
        'grupo_s_id',
        'unidad_medida_id',
    ];
}
