<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Orden;

class AdminOrdenController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $ordenes = Orden::all();

        $argumentos = array();
        $argumentos['ordenes'] = $ordenes;

        return view('admin.ordenes.index', $argumentos);
    }

    public function create()
    {
        return view('admin.ordenes.create');
    }

    public function store(Request $request)
    {
        $orden = new Orden();

        $orden->id_user = $request->user()->id;
        $orden->orden = $request->input('txtOrden');
        $orden->nombre_cliente = $request->input('txtCliente');
        $orden->direccion = $request->input('txtDireccion');
        $orden->telefono = $request->input('txtTelefono');
        $orden->estado = $request->input('txtEstado');

        if($orden->save()) {
            return redirect()->
                route('ordenes.index')->
                with('exito','La orden fue enviada correctamente');
        }

        return redirect()->route('ordenes.index')->
            with('error','No se pudo enviar la orden');
    }

    public function show($id)
    {
        $orden = Orden::find($id);

        if($orden) {
            $argumentos= array();
            $argumentos['orden'] = $orden;
            
            return view('admin.ordenes.show', $argumentos);
        }

        return redirect()-> 
            route('ordenes.index')-> 
            with('error', 'No se econtró la orden');
    }


    public function edit($id)
    {
        $orden = Orden::find($id);

        if($orden) {
            $argumentos= array();
            $argumentos['orden'] = $orden;
            
            return view('admin.ordenes.edit', $argumentos);
        }

        return redirect()-> 
            route('ordenes.index')-> 
            with('error', 'No se econtró la orden');
    }

    public function update(Request $request, $id)
    {
        $orden = Orden::find($id);

        if($orden) {
            $orden->orden = $request->input('txtOrden');
            $orden->nombre_cliente = $request->input('txtCliente');
            $orden->direccion = $request->input('txtDireccion');
            $orden->telefono = $request->input('txtTelefono');
            $orden->estado = $request->input('txtEstado');

            if($orden->save()) {
                return redirect()->
                    route('ordenes.edit', $id)->
                    with('exito', 'La orden se actualizó exitosamente');
            }

            return redirect()->
                    route('ordenes.edit', $id)->
                    with('error', 'No se pudo actualizar la orden');
        }

        return redirect()->
            route('ordenes.index')->
            with('error', 'No se econtró la orden');
    }

    public function destroy($id)
    {
        $orden = Orden::find($id);

        if($orden) {
            if($orden->delete()) {
                return redirect()->
                    route('ordenes.index', $id)->
                    with('exito', 'La orden se eliminó exitosamente');
            }

            return redirect()->
                    route('ordenes.index', $id)->
                    with('error', 'No se pudo eliminar la orden');
        }

        return redirect()->
            route('ordenes.index')->
            with('error', 'No se pudo eliminar la orden');
    }
}
