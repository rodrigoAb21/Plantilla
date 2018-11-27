<?php

namespace App\Http\Controllers\activos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrasladoController extends Controller
{
    public function index(){
        return view('activos.mov-activos.traslados.index');
    }

    public function create(){
        return view('activos.mov-activos.traslados.create');
    }

    public function show(){
        return view('activos.mov-activos.traslados.show');
    }

    public function destroy(){
        return view('activos.mov-activos.traslados.index');
    }
}
