@extends('adminlte::page')

@section('title', 'Actualizar sucursal')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Sucursal</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Sucursal</li>
            <li class="breadcrumb-item active">Actualizar</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-id-badge me-1"></i>
                Actualizar la sucursal de {{ $sucursal->sucursal }}.
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('sucursales.update',$sucursal->id) }}" class="msg-success">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Sucursal</label>
                                <input type="text" name="sucursal" class="form-control" value="{{ $sucursal->sucursal }}">
                            </div>
                            <div class="form-group">
                                <label for="permission">Codigo</label> <br/>
                                <textarea name="detalle" id=""  class="form-control" style="height: 100px" >{{ $sucursal->detalle }}</textarea>
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
