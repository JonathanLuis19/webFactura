@extends('adminlte::page')

@section('title', 'Transacciones')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Transacciones comerciales con los proveedores</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Transacciones</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        @can('crear-transaccion-con-el-proveedor')
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route("transacciones_proveedor.create") }}" class="btn btn-primary"><i class="fas fa-user-shield"></i> Nuevo</a>
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
                        <th style="color: #FFF">Proveedor</th>
                        <th style="color: #FFF">Descripcion</th>
                        <th style="color: #FFF">Monto</th>
                        <th style="color: #FFF">Detalles adicionales</th>
                        <th style="color: #FFF">Fecha de creación</th>
                        <th style="color: #FFF">Fecha de actualización</th>
                        <th style="color: #FFF">Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($transaccion_proveedor as $transaccion)
                            <tr>
                                <td style="display: none">{{$transaccion->id}}</td>
                                <td>{{ $transaccion->proveedor->entidad }}</td>
                                <td>{{ $transaccion->descripcion }}</td>
                                <td>{{ $transaccion->monto }}</td>
                                <td>{{ $transaccion->detalles_adicionales }}</td>
                                <td>{{ $transaccion->created_at }}</td>
                                <td>{{ $transaccion->updated_at }}</td>
                                <td >
                                    @can('editar-transaccion-con-el-proveedor')
                                        <a href="{{ route('transacciones_proveedor.edit',$transaccion->id) }}" ><i class="fas fa-edit"></i></a>
                                    @endcan

                                    @can('borrar-transaccion-con-el-proveedor')
                                        <form method="POST" action="{{ route('transacciones_proveedor.destroy', $transaccion->id) }}" class="msg-delete" style="display: inline;">
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
                    {!! $transaccion_proveedor->links() !!}
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
