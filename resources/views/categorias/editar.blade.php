@extends('adminlte::page')

@section('title', 'Actualizar categoria')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Categoria</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Categorias</li>
            <li class="breadcrumb-item active">Actualizar</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-id-badge me-1"></i>
                Actualizar la categoria {{$categoria->nombre}}.
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('categorias.update', $categoria->id) }}" class="msg-success">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Categoria</label>
                                <input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}" >
                            </div>
                            <div class="form-group">
                                <label for="detalle">Detalle</label> <br/>
                                <textarea name="detalle" id=""  class="form-control" style="height: 100px">{{$categoria->detalle}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="activo">Estado</label>
                                <select name="activo" class="form-control" aria-label="Default select example">
                                    <option value="1" {{ $categoria->activo == 1 ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ $categoria->activo == 0 ? 'selected' : '' }}>Inactivo</option>
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
