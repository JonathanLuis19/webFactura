@extends('adminlte::page')

@section('title', 'Actualizar metodo de pago')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Actualizar metodo de pago</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Metodos de pago</li>
            <li class="breadcrumb-item active">Actualizar</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-id-badge me-1"></i>
                Actualizar el metodo de pago {{$metodo_pago->metodo_pago}}.
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('metodo_pago.update', $metodo_pago->id) }}" class="msg-success">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="metodo_pago">Metodo de pago</label>
                                <input type="text" name="metodo_pago" class="form-control" value="{{ $metodo_pago->metodo_pago }}">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label> <br/>
                                <textarea name="descripcion" id=""  class="form-control" style="height: 100px">{{ $metodo_pago->descripcion }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="activo">Estado</label>
                                <select name="activo" class="form-control" aria-label="Default select example">
                                    <option value="1" {{ $metodo_pago->activo == 1 ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ $metodo_pago->activo == 0 ? 'selected' : '' }}>Inactivo</option>
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
