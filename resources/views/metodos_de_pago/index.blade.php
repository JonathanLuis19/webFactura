@extends('adminlte::page')

@section('title', 'Metodos de pago')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Metodos de pago</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Metodos de pago</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        @can('crear-metodo-de-pago')
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route("metodo_pago.create") }}" class="btn btn-primary"><i class="fas fa-user-shield"></i> Nuevo</a>
                <a href="" class="btn btn-success"><i class="fas fa-file-excel"></i> Exportar </a>                     
            </div>
        </div>
        @endcan
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-id-badge me-1"></i>
                Lista de categorias.
            </div>
            <div class="card-body">

                <table class="table table-striped table-hover table-bordered">
                    <thead style="background-color: rgb(107, 105, 105);">
                        <th style="display: none">ID</th>
                        <th style="color: #FFF">Metodo de pago</th>
                        <th style="color: #FFF">Descripción</th>
                        <th style="color: #FFF">Estado</th>
                        <th style="color: #FFF">Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($metodos_pago as $md_pago)
                            <tr>
                                <td style="display: none">{{$md_pago->id}}</td>
                                <td>{{ $md_pago->metodo_pago }}</td>
                                <td>{{ $md_pago->descripcion }}</td>
                                <td>
                                    @if ($md_pago->activo ==true)
                                        <h5><span class="badge badge-info">Activo</span></h5>
                                    @else
                                        <h5><span class="badge badge-danger">Inactivo</span></h5>
                                    @endif
                                </td>
                                <td >
                                    @can('editar-metodo-de-pago')
                                        <a href="{{ route('metodo_pago.edit',$md_pago->id) }}" ><i class="fas fa-edit"></i></a>
                                    @endcan

                                    @can('borrar-metodo-de-pago')
                                        <form method="POST" action="{{ route('metodo_pago.destroy', $md_pago->id) }}" class="msg-delete" style="display: inline;">
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
                    {!! $metodos_pago->links() !!}
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
