@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Factura N° {{$factura->n_factura}} - {{$factura->cliente->nombre}} </h1>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-user me-1"></i>
                Datos de la factura.
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            Cliente:    
                            <input type="text" class="form-control" value="{{$factura->cliente->nombre}}" disabled>
                        </div>
                        <div class="form-group">
                            Vendido por:    
                            <input type="text" class="form-control" value="{{$factura->usuario->nombre}} {{$factura->usuario->apellido}}" disabled>
                        </div>
                        <div class="form-group">
                            Forma de pago:    
                            <input type="text" class="form-control" value="{{$factura->metodoPago->metodo_pago}}" disabled>
                        </div>
                        <div class="form-group">
                            Nº de factura:    
                            <input type="text" class="form-control" value="{{$factura->n_factura}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Id de transaccion de la compra:    
                            <input type="text" class="form-control" value="{{$factura->idtransaccion}}" disabled>
                        </div> 
                        <div class="form-group">
                            Total de pago:    
                            <input type="text" class="form-control" value="{{$factura->total}}" disabled style="background-color: rgb(158, 213, 213)">
                        </div> 
                        <div class="form-group">
                            Iva aplicado:    
                            <input type="text" class="form-control" value="{{$factura->iva}}" disabled>
                        </div> 
                        <div class="form-group">
                            Fecha de registro:    
                            <input type="text" class="form-control" value="{{$factura->created_at}}" disabled>
                        </div>   
                    </div>
                </div>    
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-cart-arrow-down"></i>
                Productos comprados.
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered" id="tblDatos">
                    <thead>
                        <th>Producto</th>
                        <th>Precio ($)</th>
                        <th>Cantidad</th>
                        <th>subtotal ($)</th>
                        <th>Descuento (%)</th>
                    </thead>
                    <tbody>
                        @foreach ($factura->detalles_factura as $detalle)
                        <tr>
                            <td>{{ $detalle->producto->nombre }}</td>
                            <td>{{ $detalle->producto->precio}}</td>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>{{ $detalle->subtotal }}</td>
                            <td>{{ $detalle->descuento }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
