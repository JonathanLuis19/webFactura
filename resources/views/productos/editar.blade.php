@extends('adminlte::page')

@section('title', 'Actualizar Producto')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Producto</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Productos</li>
            <li class="breadcrumb-item active">Actualizar</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-id-badge me-1"></i>
                Actualizar el producto <strong>{{$producto->nombre}}</strong> .
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('productos.update', $producto->id) }}" class="msg-success">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre</label> <br/>
                                <input type="text" name="nombre" class="form-control" value="{{$producto->nombre}}">
                            </div>
                            <div class="form-group">
                                <label for="codigo">Codigo</label> <br/>
                                <input type="text" name="codigo" class="form-control" value="{{$producto->codigo}}">
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio</label> <br/>
                                <input type="number" name="precio" step="0.01" class="form-control" value="{{$producto->precio}}">

                            </div>
                            <div class="form-group">
                                <label for="stock">Stock</label> <br/>
                                <input type="number" name="stock" class="form-control" value="{{$producto->stock}}">
                            </div>
                            <div class="form-group">
                                <label for="detalle">Detalle</label> <br/>
                                <textarea name="detalle" id=""  class="form-control" style="height: 90px">{{$producto->detalle}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="marca_id">Marca</label>
                                <select name="marca_id" class="form-control">
                                    @foreach ($marcas as $id => $nombre)
                                        <option value="{{ $id }}" {{ $id == $producto->marca->id ? 'selected' : '' }}>
                                            {{ $nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categoria_id">Categoria</label>
                                <select name="categoria_id" class="form-control">
                                    @foreach ($categorias as $id => $nombre)
                                        <option value="{{ $id }}" {{ $id == $producto->categoria->id ? 'selected' : '' }}>
                                            {{ $nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="proveedor_id">Proveedor</label>
                                <select name="proveedor_id" class="form-control">
                                    @foreach ($proveedores as $id => $entidad)
                                        <option value="{{ $id }}" {{ $id == $producto->proveedor->id ? 'selected' : '' }}>
                                            {{ $entidad }}
                                        </option>
                                    @endforeach
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
