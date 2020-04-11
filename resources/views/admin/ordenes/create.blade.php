@extends('layouts.admin')

@section('titulo', 'Administración | Dashboard')
@section('titulo2', 'Texto del título')

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
    Volver a lista de ordenes</a>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registrar pedido</h3>
                </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" action="{{ route('ordenes.store') }}">

                        @csrf
                        <div class="form-group row">
                            <label class="col-md-1 col-form-label">Orden</label>
                            <div class="col-md-11">
                                <input type="text" name="txtOrden" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-1 col-form-label">Cliente</label>
                            <div class="col-md-11">
                             <input type="text" name="txtCliente" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-1 col-form-label">Dirección</label>
                            <div class="col-md-11">
                                <input type="text" name="txtDireccion" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-1 col-form-label">Teléfono</label>
                            <div class="col-md-11">
                                <input type="text" name="txtTelefono" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-1 col-form-label">Estado</label>
                            <div class="col-md-11">
                                <input type="text" name="txtEstado" class="form-control" value="Pendiente"/>
                            </div>
                        </div>

                        <div class="form-group"> 
                            <button type="submit" class="btn btn-primary">Guardar</button>
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