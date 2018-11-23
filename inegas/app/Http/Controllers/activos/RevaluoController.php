<?php

namespace App\Http\Controllers\activos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RevaluoController extends Controller
{
    public function index()
    {
        return view('activos.revaluos.index');
    }


    public function create()
    {
        return view('activos.revaluos.create');
    }


    public function store(Request $request)
    {
        return redirect('act/revaluos');
    }


    public function edit($id)
    {
        return view('activos.revaluos.edit');
    }

    public function show($id)
    {
        return view('activos.revaluos.show');
    }

    public function update(Request $request, $id)
    {
        return redirect('act/revaluos');
    }


    public function destroy($id)
    {
        return redirect('act/revaluos');
    }
}