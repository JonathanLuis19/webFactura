@extends('adminlte::page')

@section('title', 'Actualizar usuario')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Usuarios</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Usuarios</li>
            <li class="breadcrumb-item active">Actualizar</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user me-1"></i>
                Actualizar un nuevo usuario.
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
                <form method="Post" action="{{ route('usuarios.update', $user->id) }}" class="msg-success" >
                    @method('PUT') 
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Usuario</label>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombres</label>
                                <input type="text" name="nombre" class="form-control" value="{{$user->nombre}}">
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellidos</label>
                                <input type="text" name="apellido" class="form-control" value="{{$user->apellido}}">
                            </div>
                            <div class="form-group">
                                <label for="cedula">Cedula</label>
                                <input type="text" name="cedula" class="form-control" value="{{$user->cedula}}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="sucrusal_id">Sucursal</label>
                                    <select name="sucursal_id" class="form-control">
                                        @foreach ($sucursales as $id => $sucursal)
                                            <option value="{{ $id }}" {{ $id == $userSucursal ? 'selected' : '' }}>
                                                {{ $sucursal }}
                                            </option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="roles">Rol</label>
                                    {!! Form::select('roles[]',$roles,$userRole,array('class'=>'form-control')) !!}
                                </div>
                                <div class="form-group">
                                    <label for="activo">Estado</label>
                                    <select name="activo" class="form-control" aria-label="Default select example">
                                        <option value="1" {{ $user->activo == 1 ? 'selected' : '' }}>Activo</option>
                                        <option value="0" {{ $user->activo == 0 ? 'selected' : '' }}>Inactivo</option>
                                    </select>                                    
                                </div>
                                <div class="form-group">
                                    <label for="sueldo">Sueldo</label>
                                    <input type="number" name="sueldo" class="form-control" value="{{$user->sueldo}}">
                                </div>
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
<script src="{{ asset('js/msg_success.js') }}" ></script>
@stop

