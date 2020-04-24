@extends('layouts.admin')

@section('titulo', 'Admin | Dashboard')

@section('contenido')

<a class="btn btn-primary btn-sm" 
    style="margin-left: 8px; margin-bottom: 15px;" 
    href="{{ route('ordenes.index') }}">
    
    <i class="fas fa-arrow-left"></i> 
    Volver a lista de ordenes</a>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

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

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ver orden #{{ $orden->id }}</h3>
                </div>
                <div class="card-body">
                    <div><b>Orden:</b> {{ $orden->orden }}</div>
                    <div><b>Estado:</b> {{ $orden->estado }}</div>
                    <div><b>Cliente:</b> {{ $orden->nombre_cliente }}</div>
                    <div><b>Teléfono:</b> {{ $orden->telefono }}</div>
                    <div><b>Dirección:</b> {{ $orden->direccion }}</div>
                    <div><b>Fecha de pedido:</b> {{ $orden->created_at }}</div>
                    <div><img src="/storage/perfil/{{ $orden->foto }}" alt=""></div>
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