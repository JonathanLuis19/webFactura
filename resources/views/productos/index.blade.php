@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Productos</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Productos</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        @can('crear-producto')
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
                        <th style="color: #FFF">Codigo</th>
                        <th style="color: #FFF">Producto</th>
                        <th style="color: #FFF">Marca</th>
                        <th style="color: #FFF">Categoria</th>
                        <th style="color: #FFF">Proveedor</th>
                        <th style="color: #FFF">Detalle</th>
                        <th style="color: #FFF">Precio</th>
                        <th style="color: #FFF">Stock</th>
                        <th style="color: #FFF">Creación</th>
                        <th style="color: #FFF">Actualizacion</th>
                        <th style="color: #FFF">Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td style="display: none">{{$producto->id}}</td>
                                <td>{{ $producto->codigo }}</td>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->marca->nombre }}</td>
                                <td>{{ $producto->categoria->nombre }}</td>
                                <td>{{ $producto->proveedor->entidad }}</td>
                                <td>{{ $producto->detalle }}</td>
                                <td>{{ $producto->precio }}</td>
                                <td>
                                @if ($producto->stock >8)
                                    <h5><span class="badge badge-info">{{$producto->stock }}</span></h5>
                                @else
                                    @if ($producto->stock >2 &&$producto->stock <=8)
                                    <h5><span class="badge badge-warning">{{$producto->stock }}</span></h5>
                                    @else
                                    <h5><span class="badge badge-danger">{{$producto->stock }}</span></h5>
                                    @endif
                                @endif
                                </td>
                                <td>{{ $producto->created_at }}</td>
                                <td>{{ $producto->updated_at }}</td>
                                <td >
                                    @can('editar-producto')
                                        <a href="{{ route('productos.edit',$producto->id) }}" ><i class="fas fa-edit"></i></a>
                                    @endcan

                                    @can('borrar-producto')
                                        <form method="POST" action="{{ route('productos.destroy', $producto->id) }}" class="msg-delete" style="display: inline;">
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
                    {!! $productos->links() !!}
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
