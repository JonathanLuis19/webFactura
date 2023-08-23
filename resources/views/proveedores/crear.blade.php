@extends('adminlte::page')

@section('title', 'Nuevo proveedor')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Proveedor</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Proveedores</li>
            <li class="breadcrumb-item active">Nuevo</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-id-badge me-1"></i>
                Crear un nuevo proveedor.
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('proveedores.store') }}" class="msg-success">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="n_identidad">N° Identidad</label>
                                <input type="text" name="n_identidad" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="entidad">Entidad</label> <br/>
                                <input type="text" name="entidad" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label> <br/>
                                <textarea name="descripcion" id=""  class="form-control" style="height: 100px"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label> <br/>
                                <input type="text" name="direccion" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telf./cel.</label> <br/>
                                <input type="text" name="telefono" class="form-control">
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
