<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoA extends Model
{
    protected $table = 'grupo_a';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'visible',
        'linea_a_id',
    ];
}
