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
        @can('crear-usuario')
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route("usuarios.create") }}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Nuevo</a>
                <a href="" class="btn btn-success"><i class="fas fa-file-excel"></i> Exportar </a>                     
            </div>
        </div>
        @endcan
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-users me-1"></i>
                Lista de usuarios.
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <thead style="background-color: rgb(107, 105, 105);">
                        <tr>
                            <th style="display: none">ID</th>
                            <th style="color: #fff" scope="col">N° Cedula</th>
                            <th style="color: #fff" scope="col">Nombre</th>
                            <th style="color: #fff" scope="col">Apellido</th>
                            <th style="color: #fff" scope="col">Sucursal</th>
                            <th style="color: #fff" scope="col">Email</th>
                            <th style="color: #fff" scope="col">Sueldo</th>
                            <th style="color: #fff" scope="col">Activo</th>
                            <th style="color: #fff" scope="col">Rol</th>
                            <th style="color: #fff" scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $user)
                            <tr>
                                <td style="display: none">{{$user->id}}</td>
                                <td>{{$user->cedula}}</td>
                                <td>{{$user->nombre}}</td>
                                <td>{{$user->apellido}}</td>
                                <td>{{$user->sucursal->sucursal}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->sueldo}}</td>
                                <td>
                                    @if ($user->activo ==true)
                                        <h5><span class="badge badge-info">Activo</span></h5>
                                    @else
                                        <h5><span class="badge badge-danger">Inactivo</span></h5>
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $rolName)
                                            <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                        @endforeach
                                    @endif    
                                </td>
                                <td style="text-align: center">
                                    @can('editar-usuario')
                                        <a  href="{{ route('usuarios.edit',$user->id) }}" ><i class="fas fa-edit"></i></a>
                                    @endcan

                                    @can('borrar-usuario')
                                    <form class="msg-delete" method="POST" action="{{ route('usuarios.destroy', $user->id) }}" style="display: inline;" >
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 text-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                  
                
            </div>
            <div class="card-footer small text-muted"> Actualizado {{ $ultimoUsuario->updated_at  }}</div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('js/msg_delete.js') }}"></script>
@stop
