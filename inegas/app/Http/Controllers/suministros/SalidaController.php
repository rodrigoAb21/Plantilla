<?php

namespace App\Http\Controllers\suministros;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalidaController extends Controller
{
    public function index()
    {
        return view('suministros.mov-suministros.salidas.index');
    }


    public function create()
    {
        return view('suministros.mov-suministros.salidas.create');
    }


    public function store(Request $request)
    {
        return redirect('sum/mov-suministros/salidas');
    }


    public function show($id)
    {
        return view('suministros.mov-suministros.salidas.show');
    }

    public function destroy($id)
    {
        return redirect('sum/mov-suministros/salidas');
    }
}
