<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitas extends Model
{
    protected $table = 'visitas';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'pagina',
        'cant'
    ];


    public static function incrementar($id){
            $visita = Visitas::find($id);
            if ($visita != null){
                $visita -> cant = $visita -> cant + 1;
                $visita -> save();
            }
    }
}
