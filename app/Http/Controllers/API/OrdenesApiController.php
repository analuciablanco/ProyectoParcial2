<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Orden;

class OrdenesApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $valorLimite = 20;

        $paginaActual = intval($request->input('pagina'));
        if(!$paginaActual) {
            $paginaActual = 1;
        }

        $numeroOrdenes = Orden::count();
        $numeroPaginas = ceil($numeroOrdenes / $valorLimite);
        $ordenes = 
            Orden::where('id_user', $request->user()->id)->
            skip(($paginaActual -1) * $valorLimite)->take($valorLimite)->get();

        $respuesta = array();
        $respuesta['total'] = $numeroOrdenes;
        $respuesta['paginas'] = $numeroPaginas;
        $respuesta['pagina_actual'] = $paginaActual;
        $respuesta['ordenes'] = $ordenes;

        return $respuesta;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nuevaOrden = new Orden();

        $nuevaOrden->id_user = $request->user()->id;
        $nuevaOrden->nombre_cliente = $request->input('nombre_cliente');
        $nuevaOrden->direccion = $request->input('direccion');
        $nuevaOrden->telefono = $request->input('telefono');
        $nuevaOrden->orden = $request->input('orden');
        $nuevaOrden->estado = $request->input('estado');

        $respuesta = array();
        $respuesta['exito'] = false;

        if($nuevaOrden->save()) {
            $respuesta['exito'] = true;
        }

        return $respuesta;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orden = Orden::find($id);

        if($orden) {
            $argumentos= array();
            $argumentos['orden'] = $orden;
            
            $respuesta = array();
            $respuesta = $argumentos;
            return $respuesta;
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $editarOrden = Orden::find($id);

        $editarOrden->id_user = $request->user()->id;
        $editarOrden->nombre_cliente = $request->input('nombre_cliente');
        $editarOrden->direccion = $request->input('direccion');
        $editarOrden->telefono = $request->input('telefono');
        $editarOrden->orden = $request->input('orden');
        $editarOrden->estado = $request->input('estado');

        $respuesta = array();
        $respuesta['exito'] = false;
        if($editarOrden -> save()){
            $respuesta['exito'] = true;
        }

        return $respuesta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
