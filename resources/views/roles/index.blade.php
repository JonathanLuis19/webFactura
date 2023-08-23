@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Roles</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Roles</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        @can('crear-rol')
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route("roles.create") }}" class="btn btn-primary"><i class="fas fa-user-shield"></i> Nuevo</a>
                <a href="" class="btn btn-success"><i class="fas fa-file-excel"></i> Exportar </a>                     
            </div>
        </div>
        @endcan
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-id-badge me-1"></i>
                Lista de roles.
            </div>
            <div class="card-body">

                <table class="table table-striped table-hover table-bordered">
                    <thead style="background-color: rgb(107, 105, 105);">
                        <th style="display: none">ID</th>
                        <th style="color: #FFF">Rol</th>
                        <th style="color: #FFF">Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td >
                                    @can('editar-rol')
                                        <a href="{{ route('roles.edit',$role->id) }}" ><i class="fas fa-edit"></i></a>
                                    @endcan

                                    @can('borrar-rol')
                                        <form method="POST" action="{{ route('roles.destroy', $role->id) }}" class="msg-delete" style="display: inline;">
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
                <div class="pagination justify-content-end">
                    {!! $roles->links() !!}
                </div>

            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{ asset('js/msg_delete.js') }}"></script>
@stop
