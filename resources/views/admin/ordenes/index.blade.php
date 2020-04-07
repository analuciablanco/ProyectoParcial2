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
                    <h3 class="card-title">Lista de pedidos</h3>
                </div>
                <div class="card-body">
                
                    <a href="{{ route('ordenes.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"> Registrar pedido</i>
                    </a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Orden</th>
                                <th>Estado</th>
                                <th>Cliente</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Fecha de pedido</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí van las noticias xd -->
                            @foreach($ordenes as $orden)
                                <tr>
                                    <td>{{ $orden->id }}</td>
                                    <td>{{ $orden->orden }}</td>
                                    <td>{{ $orden->estado }}</td>
                                    <td>{{ $orden->nombre_cliente }}</td>
                                    <td>{{ $orden->telefono }}</td>
                                    <td>{{ $orden->direccion }}</td>
                                    <td>{{ $orden->created_at }}</td>
                                    <td>
                                        <a href="" class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:;" data-toggle="modal" onclick="" 
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
@endsection

@section('estilos')
@endsection
@section('scripts')
<script type="text/javascript">
    function deleteData(id)
    {
        var id = id;
        var url = '';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }
    function formSubmit()
    {
        $("#deleteForm").submit();
    }
 </script>
@endsection