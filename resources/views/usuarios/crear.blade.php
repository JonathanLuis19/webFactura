@extends('adminlte::page')

@section('title', 'Nuevo usuario')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Usuarios</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Usuarios</li>
            <li class="breadcrumb-item active">Nuevo</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user me-1"></i>
                Crear un nuevo usuario.
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-dark alert-dismissible fade show" role="alert">
                        <strong>¡Revise los campos!</strong>
                        @foreach ($errors->all() as $error)
                            <span class="badge badge-danger">{{$error}}</span>
                        @endforeach
                        <button type="submit" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                
                {!! Form::open(array('route'=>'usuarios.store','method' => 'POST', 'class' => 'msg-success')) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombres</label>
                                <input type="text" name="nombre" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellidos</label>
                                <input type="text" name="apellido" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cedula">Cedula</label>
                                <input type="text" name="cedula" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="sucrusal_id">Sucursal</label>
                                    <select name="sucursal_id" class="form-control">
                                        @foreach ($sucursales as $id => $sucursal)
                                            <option value="{{ $id }}">{{ $sucursal }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="roles">Rol</label>
                                    {!! Form::select('roles[]', $roles,[], ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <label for="activo">Estado</label>
                                    <select name="activo" class="form-control" aria-label="Default select example">
                                        <option selected>Seleccione..</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                      </select>
                                </div>
                                <div class="form-group">
                                    <label for="sueldo">Sueldo</label>
                                    <input type="number" name="sueldo" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                {!! Form::close() !!}
                
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
