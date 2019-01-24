<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $table = 'reporte';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'codigo',
        'fecha',
        'revision'
    ];
}
