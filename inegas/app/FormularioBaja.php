<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormularioBaja extends Model
{
    protected $table = 'formulario_baja';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'fecha',
        'motivo',
        'activo_fijo_id',
    ];
}
