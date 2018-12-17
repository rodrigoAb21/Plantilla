<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalidaSuministro extends Model
{
    protected $table = 'salida_s';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'fecha',
        'observacion',
        'estado',
        'trabajador_id',
    ];

}
