<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineaA extends Model
{
    protected $table = 'linea_a';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'visible',
    ];
}
