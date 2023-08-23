@extends('adminlte::page')

@section('title', 'Actualizar transacción')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Transaccion con proveedores</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Transacciones</li>
            <li class="breadcrumb-item active">Actualización</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-id-badge me-1"></i>
                Actualizar la transacción comercial con el proveedor {{$proveedorSelected->entidad}}.
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('transacciones_proveedor.update', $transaccion_comercial->id) }}" class="msg-success">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="proveedor_id">Proveedor</label>
                                <select   name="proveedor_id" class="form-control">
                                    @foreach ($proveedores as $id => $entidad)
                                        <option value="{{ $id }}" {{ $id == $proveedorSelected->id ? 'selected' : '' }} >
                                            {{ $entidad }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="monto">Monto</label> <br/>
                                <input type="number" name="monto" class="form-control" value="{{$transaccion_comercial->monto}}">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label> <br/>
                                <textarea name="descripcion" id=""  class="form-control" style="height: 70px">{{$transaccion_comercial->descripcion}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="detalles_adicionales">Detalles Adicionales</label> <br/>
                                <textarea name="detalles_adicionales" id=""  class="form-control" style="height: 70px">{{$transaccion_comercial->detalles_adicionales}}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
                 
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{ asset('js/msg_success.js') }}"></script>
@stop
