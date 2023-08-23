@extends('adminlte::page')

@section('title', 'Facturas')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Facturas registradas</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Facturas</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        @can('crear-factura')
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route("facturas.create") }}" class="btn btn-primary"><i class="fas fa-user-shield"></i> Nuevo</a>
                <a href="" class="btn btn-success"><i class="fas fa-file-excel"></i> Exportar </a>                     
            </div>
        </div>
        @endcan
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-id-badge me-1"></i>
                Lista de las facturas registradas.
            </div>
            <div class="card-body">

                <table class="table table-striped table-hover table-bordered">
                    <thead style="background-color: rgb(107, 105, 105);">
                        <th style="display: none">ID</th>
                        <th style="color: #FFF">Vendedor</th>
                        <th style="color: #FFF">Cliente</th>
                        <th style="color: #FFF">forma de pago</th>
                        <th style="color: #FFF">Nº factura</th>
                        <th style="color: #FFF">iva</th>
                        <th style="color: #FFF">Total de venta</th>
                        <th style="color: #FFF">ID transaccion</th>
                        <th style="color: #FFF">Fecha Creacion</th>
                        <th style="color: #FFF"></th>
                    </thead>
                    <tbody>
                        @foreach ($facturas as $factura)
                            <tr>
                                <td style="display: none">{{$factura->id}}</td>
                                <td>{{ $factura->usuario->name }}</td>
                                <td>{{ $factura->cliente->nombre }}</td>
                                <td>{{ $factura->metodoPago->metodo_pago }}</td>
                                <td>{{ $factura->n_factura }}</td>
                                <td>{{ $factura->iva }}</td>
                                <td>{{ $factura->total }}</td>
                                <td>{{ $factura->idtransaccion }}</td>
                                <td>{{ $factura->created_at }}</td>
                                <td >
                                    @can('ver-factura-registrada')
                                        <a href="{{ route('factura.registrada',$factura->id) }}" ><i class="fas fa-eye text-info"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {!! $facturas->links() !!}
                    </ul>
                </nav>
                

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
