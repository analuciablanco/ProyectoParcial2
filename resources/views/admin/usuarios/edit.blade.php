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
    href="{{ route('usuarios.index') }}">
    
    <i class="fas fa-arrow-left"></i> 
    Volver a lista de usuarios</a>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar usuario id: {{ $usuario->id }}</h3>
                </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" action="{{ route('usuarios.update', $usuario->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nombre</label>
                            <div class="col-md-10">
                                <input type="text" name="txtName" class="form-control" value="{{ $usuario->name }}"/>
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Correo</label>
                            <div class="col-md-10">
                                <input type="text" name="txtEmail" class="form-control" value="{{ $usuario->email }}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Contraseña</label> 
                            <div class="col-md-10">
                                <input id="password" type="password" name="txtPassword" class="form-control" value="{{ $usuario->password }}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Confirmar contraseña</label>    
                            <div class="col-md-10">
                                <input id="confirm_password" type="password" name="txtPassword" class="form-control" value="{{ $usuario->password }}"/>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Tipo de usuario</label>
                            <div class="col-md-10">
                                <select name="txtUserType" class="form-control" data-toggle="dropdown" aria-expanded="false">
                                    <option value="{{ $usuario->id_user_type }}" class="dropdown-item" role="presentation">{{ $usuario->user_type }}</option>
                                    <option value="1" class="dropdown-item" role="presentation">Administrador</option>
                                    <option value="2" class="dropdown-item" role="presentation">Capturador</option>
                                    <option value="3" class="dropdown-item" role="presentation">Repartidor</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Foto de perfil</label>
                            <div class="col-md-1">
                                @if($usuario->picture)
                                    <a href="/storage/perfil/{{ $usuario->picture }}" target="_blank">
                                        <img class="border rounded-circle img-profile" src="/storage/perfil/{{ $usuario->picture }}" height="40" width="40">
                                    </a>
                                @else
                                @endif
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="imgProfile" class="form-control"/>
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