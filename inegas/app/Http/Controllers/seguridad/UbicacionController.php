<?php

namespace App\Http\Controllers\seguridad;

use App\Ubicacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UbicacionController extends Controller
{
    public function index(Request $request)
    {
        $ubicaciones = DB::table('ubicacion')
            ->where('nombre', 'LIKE','%'.trim($request['busqueda']).'%')
            ->where('visible', '=', true)
            ->orderBy('id', 'asc')
            ->paginate(5);
        return view('seguridad.ubicaciones.index', ['ubicaciones' => $ubicaciones]);
    }


    public function create()
    {
        return view('seguridad.ubicaciones.create');
    }


    public function store(Request $request)
    {
        $ubi = new Ubicacion();
        $ubi -> nombre = $request['nombre'];
        $ubi -> visible = true;
        $ubi -> save();

        return redirect('seg/ubicaciones');
    }


    public function edit($id)
    {
        return view('seguridad.ubicaciones.edit', ['ubicacion' => Ubicacion::findOrFail($id)]);
    }


    public function update(Request $request, $id)
    {
        $ubi = Ubicacion::findOrFail($id);
        $ubi -> nombre = $request['nombre'];
        $ubi -> save();

        return redirect('seg/ubicaciones');
    }


    public function destroy($id)
    {
        $ubi = Ubicacion::findOrFail($id);
        $ubi -> visible = false;
        $ubi -> save();

        return redirect('seg/ubicaciones');
    }
}
