@extends('layouts.admin')

@section('titulo', 'Administración | Dashboard')

@section('breadcrumbs')
@endsection

@section('contenido')

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
                    <h3 class="card-title">Lista de usuarios</h3>
                </div>
                <div class="card-body">
                
                    <a href="{{ route('usuarios.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"> Registrar usuario</i>
                    </a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Correo</th>
                                <th>Tipo de usuario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td><img class="border rounded-circle img-profile" src="/storage/perfil/{{ $usuario->picture }}" height="40" width="40"> 
                                        {{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->user_type }}</td>
                                    <td>
                                        <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$usuario->id}}, '{{$usuario->email}}')" 
                                            data-target="#DeleteModal" class="btn btn-danger"><i class="fas fa-times"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="DeleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="deleteForm" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    <!-- PREGUNTAR
                            POR
                        ESTA PARTE -->
                    <p class="text-center">¿Seguro que quieres eliminar al usuario: <b> <span id="spn_usuarioID"></span></b>?</p>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Sí, eliminar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


@endsection

@section('estilos')
@endsection
@section('scripts')
<script type="text/javascript">
    function deleteData(id, email)
    {
        console.log(email);
        var id = id;
        var url = '{{ route("usuarios.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
        $("#spn_usuarioID").text(email);
    }
    function formSubmit()
    {
        $("#deleteForm").submit();
    }
 </script>
@endsection