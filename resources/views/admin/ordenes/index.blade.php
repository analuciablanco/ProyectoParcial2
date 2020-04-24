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
                
                @if(Auth::user()->id_user_type != 3)
                    <a href="{{ route('ordenes.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"> Registrar pedido</i>
                    </a>
                @endif

                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="criterio" id="txtCriterio">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </form>

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
                                        <a href="{{ route('ordenes.show', $orden->id) }}" class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="{{ route('ordenes.edit', $orden->id) }}" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                    @if(Auth::user()->id_user_type != 3)
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$orden->id}})" 
                                            data-target="#DeleteModal" class="btn btn-danger"><i class="fas fa-times"></i></a>
                                    @endif

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
                    <h4 class="modal-title">Eliminar Orden</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    <p class="text-center">¿Seguro que quieres eliminar la orden <b>#<span id="spn_ordenID">{{ $orden->id }}</span></b>?</p>
                    <p class="text-center">"<span>{{ $orden->orden }}</span>"</p>
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
    function deleteData(id)
    {
        var id = id;
        var url = '{{ route("ordenes.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
        $("#spn_ordenID").text(id);
    }
    function formSubmit()
    {
        $("#deleteForm").submit();
    }
 </script>
@endsection