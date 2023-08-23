@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Usuarios</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Usuarios</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-3">
            <div class="card-body">
                                     
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-users me-1"></i>
                Lista de usuarios.
            </div>
            <div class="card-body">
                
            </div>
            <div class="card-footer small text-muted"> ------------------ </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
