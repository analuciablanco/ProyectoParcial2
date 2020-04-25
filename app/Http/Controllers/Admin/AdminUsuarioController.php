<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Usuario;

class AdminUsuarioController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $usuarios = Usuario::all();

        $argumentos = array();
        $argumentos['usuarios'] = $usuarios;

        return view('admin.usuarios.index', $argumentos);
    }

    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {
        // where(columna, valor)
        $verification = Usuario::where('email', $request->input('txtEmail'))->first();

        if($verification) {
            return redirect()->
                route('usuarios.create')->
                with('error','el correo ya existe en los registros');
        }

        $usuario = new Usuario();

        $usuario->id_user_type = $request->input('txtUserType');

        if($request->input('txtUserType') == '1')
        {
            $usuario->user_type = 'Administrador';
        }
        else if($request->input('txtUserType') == '2')
        {
            $usuario->user_type = 'Capturador';
        }
        else if($request->input('txtUserType') == '3')
        {
            $usuario->user_type = 'Repartidor';
        }
        else 
        {
            $usuario->user_type = '---';
        }

        $usuario->name = $request->input('txtName');
        $usuario->email = $request->input('txtEmail');
        $usuario->password = bcrypt($request->input('txtPassword'));
        
        if($request->hasFile('imgProfile')) {
            $archivoProfile = $request->file('imgProfile');
            $rutaArchivo = $archivoProfile->store('public\perfil');
            $rutaArchivo = substr($rutaArchivo, 14);
            $usuario->picture = $rutaArchivo;
        }

        if($usuario->save()) {
            return redirect()->
                route('usuarios.index')->
                with('exito','El usuario fue añadido correctamente');
        }

        return redirect()->route('usuarios.index')->
            with('error','No se pudo guardar al usuario');           
    }

    public function show($id)
    {
        $usuario = Usuario::find($id);

        if($usuario) {
            $argumentos= array();
            $argumentos['usuario'] = $usuario;
            
            return view('admin.usuarios.show', $argumentos);
        }

        return redirect()-> 
            route('usuarios.index')-> 
            with('error', 'No se econtró al usuario');
    }

    public function edit($id)
    {
        $usuario = Usuario::find($id);

        if($usuario) {
            $argumentos= array();
            $argumentos['usuario'] = $usuario;
            
            return view('admin.usuarios.edit', $argumentos);
        }

        return redirect()-> 
            route('usuarios.index')-> 
            with('error', 'No se econtró al usuario');
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        if($usuario) {
            $usuario->id_user_type = $request->input('txtUserType');

            if($request->input('txtUserType') == '1')
            {
                $usuario->user_type = 'Administrador';
            }
            else if($request->input('txtUserType') == '2')
            {
                $usuario->user_type = 'Capturador';
            }
            else if($request->input('txtUserType') == '3')
            {
                $usuario->user_type = 'Repartidor';
            }
            else 
            {
                $usuario->user_type = '---';
            }

            $usuario->name = $request->input('txtName');
            $usuario->email = $request->input('txtEmail');
            if($usuario->password != $request->input('txtPassword'))
            {
                $usuario->password = bcrypt($request->input('txtPassword'));
            }
            
            if($request->hasFile('imgProfile')) {
                $archivoProfile = $request->file('imgProfile');
                $rutaArchivo = $archivoProfile->store('public\perfil');
                $rutaArchivo = substr($rutaArchivo, 14);
                $usuario->picture = $rutaArchivo;
            }

            if($usuario->save()) {
                return redirect()->
                    route('usuarios.edit', $id)->
                    with('exito', 'El usuario se actualizó exitosamente');
            }

            return redirect()->
                    route('usuarios.edit', $id)->
                    with('error', 'No se pudo actualizar al usuario');
        }

        return redirect()->
            route('usuarios.index')->
            with('error', 'No se econtró al usuario');
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if($usuario) {
            if($usuario->delete()) {
                return redirect()->
                    route('usuarios.index', $id)->
                    with('exito', 'El usuario se eliminó exitosamente');
            }

            return redirect()->
                    route('usuarios.index', $id)->
                    with('error', 'No se pudo eliminar al usuario');
        }

        return redirect()->
            route('usuarios.index')->
            with('error', 'No se pudo eliminar al usuario');
    }
}
