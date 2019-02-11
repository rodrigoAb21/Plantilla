<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicaciones extends Model
{
    protected $table = 'ubicaciones';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'u_id'
    ];
    public $timestamps = false;

    public function hijos()
    {
        return $this->hasMany('App\Ubicaciones', 'u_id');
    }

}
