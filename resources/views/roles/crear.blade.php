@extends('adminlte::page')

@section('title', 'Nuevo rol')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Usuarios</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Roles</li>
            <li class="breadcrumb-item active">Nuevo</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-id-badge me-1"></i>
                Crear un nuevo rol.
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('roles.store') }}" class="msg-success">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nombre del rol</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="permission">Permisos para este Rol</label> <br/>
                                @foreach ($permisos as $value)
                                    <label>
                                        <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="name">
                                        {{ $value->name }}
                                    </label><br>
                                @endforeach
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
