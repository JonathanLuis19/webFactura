@extends('adminlte::page')

@section('title', 'Nuevo metodo de pago')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Metodo de pago</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Metodos de pago</li>
            <li class="breadcrumb-item active">Nuevo</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-id-badge me-1"></i>
                Crear un nuevo metodo de pago.
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('metodo_pago.store') }}" class="msg-success">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="metodo_pago">Metodo de pago</label>
                                <input type="text" name="metodo_pago" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label> <br/>
                                <textarea name="descripcion" id=""  class="form-control" style="height: 100px"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="activo">Estado</label>
                                <select name="activo" class="form-control" aria-label="Default select example">
                                    <option selected>Seleccione..</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                  </select>
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
