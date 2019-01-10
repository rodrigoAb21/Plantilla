<?php

namespace App\Http\Controllers\seguridad;

use App\Bitacora;
use App\Http\Requests\seguridad\UsuarioRequest;
use App\Tablas;
use App\User;
use App\Visitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $usuarios = DB::table('users')
            ->where('nombre','LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('cargo','LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('area','LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('estado','LIKE','%'.trim($request['busqueda']).'%')
            ->orderBy('id', 'asc')
            ->paginate(5);

        return view('seguridad.usuarios.index', ['usuarios' => $usuarios, 'busqueda' => trim($request['busqueda'])]);
    }


    public function create()
    {
        $areas = ['Activos Fijos', 'Suministros', 'Activos Fijos - Suministros'];
        return view('seguridad.usuarios.create', ['areas' => $areas]);
    }


    public function store(UsuarioRequest $request)
    {

        $usuario = new User();
        $usuario -> nombre = $request['nombre'];
        $usuario -> cargo = $request['cargo'];
        $usuario -> email = $request['email'];
        $usuario -> area = $request['area'];
        $usuario -> estado = "Habilitado";
        $usuario -> color = "white";
        $usuario -> password = bcrypt($request['password']);
        if ($usuario -> save()){
            Bitacora::registrar_accion(Tablas::$usuario, 'Creó al usuario con ID:'.$usuario->id);
        }

        return redirect('seg/usuarios');
    }


    public function edit($id)
    {
        $areas = ['Activos Fijos', 'Suministros', 'Activos Fijos - Suministros'];
        return view('seguridad.usuarios.edit', ['usuario' => User::findOrFail($id), 'areas' => $areas]);
    }


    public function update(Request $request, $id)
    {
        $this -> validate($request, [
            'nombre' => 'required|max:255|string',
            'cargo' => 'required|max:255|string',
            'email' => 'required|string|email|max:255|unique:users',
            'area' => ['required','max:255|string', Rule::in(['Activos Fijos', 'Suministros',
                'Activos Fijos - Suministros'])],
            'password' => 'nullable|max:255|string|min:6'
        ]);

        $usuario = User::findOrFail($id);
        $usuario -> nombre = $request['nombre'];
        $usuario -> cargo = $request['cargo'];
        $usuario -> email = $request['email'];
        $usuario -> area = $request['area'];
        if (trim($request['password']) != ""){
            $usuario -> password = bcrypt($request['password']);
        }
        if ($usuario -> save()){
            Bitacora::registrar_accion(Tablas::$usuario, 'Editó al usuario con ID:'.$usuario->id);
        }

        return redirect('seg/usuarios');
    }


    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario -> estado = "Deshabilitado";
        if ($usuario -> save()){
            Bitacora::registrar_accion(Tablas::$usuario, 'Deshabilitó al usuario con ID:'.$usuario->id);
        }
        return redirect('seg/usuarios');
    }

    public function habilitar($id)
    {
        $usuario = User::findOrFail($id);
        $usuario -> estado = "Habilitado";
        if ($usuario -> save()){
            Bitacora::registrar_accion(Tablas::$usuario, 'Habilitó al usuario con ID:'.$usuario->id);
        }

        return redirect('seg/usuarios');
    }

    public function tema(){
        $u = User::findOrFail(Auth::user()->id);

        if ($u->color == 'white'){
            $u->color = 'black';
        }else {
            $u->color = 'white';
        }

        $u -> save();

        return redirect('login');

    }

}
