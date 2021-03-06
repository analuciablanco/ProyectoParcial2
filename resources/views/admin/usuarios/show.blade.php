@extends('layouts.admin')

@section('titulo', 'Admin | Dashboard')

@section('contenido')

<a class="btn btn-primary btn-sm" 
    style="margin-left: 8px; margin-bottom: 15px;" 
    href="{{ route('usuarios.index') }}">
    
    <i class="fas fa-arrow-left"></i> 
    Volver a lista de usuarios</a>

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
                    <h3 class="card-title">Ver usuario id: {{ $usuario->id }}</h3>
                </div>
                <div class="card-body">
                    <p>Nombre: {{ $usuario->name }}</p>
                    <p>Correo: {{ $usuario->email }}</p>
                    <p>Tipo de usuario: {{ $usuario->user_type }}</p>
                    <p><img src="/storage/perfil/{{ $usuario->picture }}" alt=""></p>
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