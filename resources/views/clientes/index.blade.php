@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Clientes</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Clientes</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        @can('crear-cliente')
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route("productos.create") }}" class="btn btn-primary"><i class="fas fa-user-shield"></i> Nuevo</a>
                <a href="" class="btn btn-success"><i class="fas fa-file-excel"></i> Exportar </a>                     
            </div>
        </div>
        @endcan
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-id-badge me-1"></i>
                Lista de las transacciones realizadas con los proveedores.
            </div>
            <div class="card-body">

                <table class="table table-striped table-hover table-bordered">
                    <thead style="background-color: rgb(107, 105, 105);">
                        <th style="display: none">ID</th>
                        <th style="color: #FFF">Cedula</th>
                        <th style="color: #FFF">Nombre</th>
                        <th style="color: #FFF">Dirección</th>
                        <th style="color: #FFF">Telf./cel.</th>
                        <th style="color: #FFF">Email</th>
                        <th style="color: #FFF">Creación</th>
                        <th style="color: #FFF">Actualizacion</th>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td style="display: none">{{$cliente->id}}</td>
                                <td>{{ $cliente->cedula }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->direccion }}</td>
                                <td>{{ $cliente->telefono }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ $cliente->created_at }}</td>
                                <td>{{ $cliente->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-end">
                    {!! $clientes->links() !!}
                </div>

            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{ asset('js/msg_delete.js') }}"></script>
@stop
