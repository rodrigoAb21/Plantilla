<?php

namespace App\Http\Controllers\suministros;

use App\Linea;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LineaController extends Controller
{
    public function index(Request $request)
    {
        $lineas = DB::table('linea')
            ->where('nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('visible', '=', true)
            ->orderBy('id', 'asc')
            ->paginate(5);
        return view('suministros.lineas.index',['lineas' => $lineas]);
    }


    public function create()
    {
        return view('suministros.lineas.create');
    }


    public function store(Request $request)
    {
        $unidad = new Linea();
        $unidad -> nombre = $request['nombre'];
        $unidad -> visible = true;
        $unidad -> save();

        return redirect('sum/lineas');
    }


    public function edit($id)
    {
        return view('suministros.lineas.edit', ['linea' => Linea::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $unidad = Linea::findOrFail($id);
        $unidad -> nombre = $request['nombre'];
        $unidad -> save();

        return redirect('sum/lineas');
    }


    public function destroy($id)
    {
        $unidad = Linea::findOrFail($id);
        $unidad -> visible = false;
        $unidad -> save();
        return redirect('sum/lineas');
    }
}
