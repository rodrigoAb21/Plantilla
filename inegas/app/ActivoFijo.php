<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivoFijo extends Model
{
    protected $table = 'activo_fijo';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'foto',
        'codigo',
        'disponibilidad',
        'costo_actual',
        'costo_ingreso',
        'serie',
        'marca',
        'color',
        'modelo',
        'caracteristicas',
        'visible',
        'grupo_a_id',
        'ingreso_a_id',
        'ubicacion_id',
        'trabajador_id'
    ];
}
