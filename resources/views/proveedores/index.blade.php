@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Proveedores</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Proveedores</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        @can('crear-proveedor')
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route("proveedores.create") }}" class="btn btn-primary"><i class="fas fa-user-shield"></i> Nuevo</a>
                <a href="" class="btn btn-success"><i class="fas fa-file-excel"></i> Exportar </a>                     
            </div>
        </div>
        @endcan
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-id-badge me-1"></i>
                Lista de proveedores.
            </div>
            <div class="card-body">

                <table class="table table-striped table-hover table-bordered">
                    <thead style="background-color: rgb(107, 105, 105);">
                        <th style="display: none">ID</th>
                        <th style="color: #FFF">N° Identidad</th>
                        <th style="color: #FFF">Entidad</th>
                        <th style="color: #FFF">Descripción</th>
                        <th style="color: #FFF">Dirección</th>
                        <th style="color: #FFF">Telf./cel.</th>
                        <th style="color: #FFF">Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($proveedores as $proveedor)
                            <tr>
                                <td style="display: none">{{$proveedor->id}}</td>
                                <td>{{ $proveedor->n_identidad }}</td>
                                <td>{{ $proveedor->entidad }}</td>
                                <td>{{ $proveedor->descripcion }}</td>
                                <td>{{ $proveedor->direccion }}</td>
                                <td>{{ $proveedor->telefono }}</td>
                                <td >
                                    @can('editar-proveedor')
                                        <a href="{{ route('proveedores.edit',$proveedor->id) }}" ><i class="fas fa-edit"></i></a>
                                    @endcan

                                    @can('borrar-proveedor')
                                        <form method="POST" action="{{ route('proveedores.destroy', $proveedor->id) }}" class="msg-delete" style="display: inline;">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-link p-0 text-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>                                    
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-end">
                    {!! $proveedores->links() !!}
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
