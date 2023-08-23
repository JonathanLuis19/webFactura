@extends('adminlte::page')

@section('title', 'Sucursales')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Sucursales</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Sucursales</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        @can('crear-sucursal')
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route("sucursales.create") }}" class="btn btn-primary"><i class="fas fa-user-shield"></i> Nuevo</a>
                <a href="" class="btn btn-success"><i class="fas fa-file-excel"></i> Exportar </a>                     
            </div>
        </div>
        @endcan
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-id-badge me-1"></i>
                Lista de sucursales.
            </div>
            <div class="card-body">
 
                <table class="table table-striped table-hover table-bordered">
                    <thead style="background-color: rgb(107, 105, 105);">
                        <th style="display: none">ID</th>
                        <th style="color: #FFF">Ubicacion</th>
                        <th style="color: #FFF">Codigo</th>
                        <th style="color: #FFF">Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($sucursales as $sucursal)
                            <tr>
                                <td style="display: none">{{$sucursal->id}}</td>
                                <td>{{ $sucursal->sucursal }}</td>
                                <td>{{ $sucursal->detalle }}</td>
                                <td >
                                    @can('editar-sucursal')
                                        <a href="{{ route('sucursales.edit',$sucursal->id) }}" ><i class="fas fa-edit"></i></a>
                                    @endcan

                                    @can('borrar-sucursal')
                                        <form method="POST" action="{{ route('sucursales.destroy', $sucursal->id) }}" class="msg-delete" style="display: inline;">
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
                    {!! $sucursales->links() !!}
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
