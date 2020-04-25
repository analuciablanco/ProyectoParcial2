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
                <div class="row">
                    <div class="card-header">
                        <h3 class="card-title">Lista de pedidos</h3>
                    </div>
                    <div class="card-body filterable">
                    
                    @if(Auth::user()->id_user_type != 3)
                        <a href="{{ route('ordenes.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"> Registrar pedido</i>
                        </a>
                    @endif

                        <!-- <form> -->
                            <div class="row">
                                <div class="col-md-12 pull-right">
                                    <!-- <div class="form-group">
                                        <input class="form-control" type="text" name="criterio" id="txtCriterio">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Buscar</button>
                                    </div> -->
                                    <button class="btn btn-info btn-filter">Filtros</button>
                                </div>
                            </div>
                        <!-- </form> -->

                        <table class="table">
                            <thead>
                                <tr class="filters">
                                    <th>ID</th>
                                    <th><input type="text" class="form-control" placeholder="Orden" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Estado" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Cliente" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Dirección" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Teléfono" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Fecha de pedido" disabled></th>
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
                                        <td>{{ $orden->direccion }}</td>
                                        <td>{{ $orden->telefono }}</td>
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

 <script>
     $(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            console.log("Entrada de boton xD");
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            console.log("Están disabled xd");
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});
 </script>
@endsection