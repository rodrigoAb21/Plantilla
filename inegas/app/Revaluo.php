<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revaluo extends Model
{
    protected $table = 'revaluo';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'fecha',
        'monto',
        'tipo',
        'motivo',
        'estado',
        'activo_fijo_id',
    ];
}
