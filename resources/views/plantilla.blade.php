@extends('layouts.admin')


@section('maincss')

@endsection


@section('titulo', 'Administración | Titulo')
@section('subtitulo', 'Lista de Noticias')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>
                        <i class="icon fas fa-check"></i> Éxito
                    </h5>
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('failure'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>
                        <i class="icon fas fa-check"></i> Error
                    </h5>
                    {{ Session::get('failure') }}
                </div>
            @endif
            <div class="card">
                <!--div class="card-header">
                    <h3 class="card-title">
                        Lista de noticias
                    </h3>
                </div-->
                <div class="card-body">
                    <a href="" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Agregar Reparación
                    </a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Reparacion
                                </th>
                                <th>
                                    Acciones
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($noticias as $noticia)
                                <tr>
                                    <td>
                                        {{$noticia -> titulo}}
                                    </td>
                                    <td>
                                        <button class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-success">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger">
                                            <i class="fas fa-times"></i>
                                        </button>
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


@section('mainjs')

@endsection