<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevolucionController extends Controller
{
    public function index()
    {
        return view('suministros.mov-suministros.devoluciones.index');
    }


    public function create()
    {
        return view('suministros.mov-suministros.devoluciones.create');
    }


    public function store(Request $request)
    {
        return redirect('mov-suministros/devoluciones');
    }


    public function show($id)
    {
        return view('suministros.mov-suministros.devoluciones.show');
    }

    public function destroy($id)
    {
        return redirect('mov-suministros/devoluciones');
    }
}
