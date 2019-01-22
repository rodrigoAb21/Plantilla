<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{
    protected $table = 'kardex';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'tipo_mov',
        'id_mov',
        'id_sum',
        'fecha_mov',
        'cantidad',
        'saldo'
    ];
}
