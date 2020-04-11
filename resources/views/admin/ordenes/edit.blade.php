@extends('layouts.admin')

@section('titulo', 'Admin | Dashboard')

@section('contenido')

@if(Session::has('exito'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> ¡Éxito!</h5>
        {{ Session::get('exito') }}
    </div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> ¡Error!</h5>
        {{ Session::get('error') }}
    </div>
    @endif

    <a class="btn btn-primary btn-sm" 
    style="margin-left: 8px; margin-bottom: 15px;" 
    href="{{ route('ordenes.index') }}">
    
    <i class="fas fa-arrow-left"></i> 
    Volver a lista de pedidos</a>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar pedido #{{ $orden->id }}</h3>
                </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" action="{{ route('ordenes.update', $orden->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Orden</label>
                            <input type="text" name="txtOrden" value="{{ $orden->orden }}" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>Cliente</label>
                            <input type="text" name="txtCliente" value="{{ $orden->nombre_cliente }}" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" name="txtDireccion" value="{{ $orden->direccion }}" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" name="txtTelefono" value="{{ $orden->telefono }}" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>Estado</label>
                            <input type="text" name="txtEstado" value="{{ $orden->estado }}" class="form-control"/>
                        </div>

                        <div class="form-group"> 
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('estilos')
@endsection
@section('scripts')
@endsection