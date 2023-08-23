@extends('adminlte::page')

@section('title', 'Factura')

@section('content_header')
    <div class="container-fluid px-4">
        <h1>Facturación</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Facturación</li>
            <li class="breadcrumb-item active">Nuevo</li>
        </ol>
    </div> 
@stop

@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-3">
            <div class="card-header" style="background-color: rgb(210, 229, 232)">
                <i class="fas fa-users me-1"></i>
                Nueva factura, ingrese los siguientes datos.
            </div>
            <div class="card-body" style="background-color: rgb(246, 234, 246)">
                <div class="container-fluid">
                    <form action="{{ route('facturas.store') }}" method="POST"> 
                        @csrf
                        <div class="row">
                        
                            <!--Card de datos-->
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="nombre">Cliente</label> <br/>
                                            <div class="input-group mb-3">
                                                <input type="hidden" id="selected_id" name="cliente_id"> <!--CLiente-->
                                                <input type="text" class="form-control" id="search_cedula"name="search_cedula" placeholder="Ingresa su cedula" autocomplete="off">
                                                <ul id="showlist" tabindex="1" class="list-group"></ul>
                                                <div class="input-group-append">
                                                    <button class="btn btn-info" type="button" data-toggle="modal" data-target="#modalForm">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Nº factura:</label> <br/>
                                            <input type="text" name="n_factura" class="form-control" value="{{$user->sucursal->detalle}}{{$ultimoId}}" readonly> <!--Numero de facturacion-->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Responsable:</label> <br/>
                                            <input type="hidden" name="user_id" class="form-control" value="{{$user->id}}"> <!-- usuario -->
                                            <input type="text" name="nombre" class="form-control" value="{{$user->nombre}} {{$user->apellido}}" disabled="true">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Metodo de pago:</label> <br/>
                                            <select name="pago_id" class="form-control"><!-- Pagos-->
                                                @foreach ($metodos_pago as $id => $metodo_pago)
                                                    <option value="{{ $id }}">{{ $metodo_pago }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="idtransaccion">ID transacción:</label> <br/>
                                            <input type="text" name="idtransaccion" class="form-control"><!-- Id de transaccion-->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <!--Tcard para valores-->
                            <div class="col-md-2" style="background-color: rgb(238, 253, 255)" >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        Sub total ($):
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" class="form-control"  id="total-subtotal" aria-label="Amount (to the nearest dollar)" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        Iva (%):
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <input type="number" name="iva" id="iva" class="form-control" value="12">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        Total de pago:
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" name="total" id="total-con-iva" class="form-control" step="0.01" readonly>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="d-grid gap-2 mx-auto text-center" >
                                        <input type="hidden" id="detalles" name="detalles">
                                        <button type="submit" class="btn btn-primary" style="border: solid rgb(255, 0, 230)">Generar factura</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Card  para la tabla-->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-users me-1"></i>
                Detalles de la factura (Productos).
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered" id="tblDatos">
                    <thead>
                        <th >
                            <button type="submit" class="btn btn-link p-0 text-success" onclick="insertarFila()">
                                <i class="fas fa-plus"></i>
                            </button> 
                        </th>
                        <th>Producto</th>
                        <th>Codigo</th>
                        <th>Precio ($)</th>
                        <th>Cantidad</th>
                        <th>subtotal ($)</th>
                        <th>Descuento (%)</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <!--Datos-->
                    </tbody>
                </table>
            </div>
            <div class="card-footer small text-muted"> ------------------ </div>
        </div>
    </div>


    <!--Model de ingreso de clientes-->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Nuevo cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('clientes.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cedula">Cedula</label> <br/>
                                <input type="text" name="cedula"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label> <br/>
                                <input type="text" name="nombre" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="direccion">Direccion</label> <br/>
                                <input type="text" name="direccion" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono">Telefono</label> <br/>
                                <input type="text" name="telefono" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label> <br/>
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}">
@stop

@section('js')
<!-- lib - para autocompletado -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }}"></script>
<!--Script para buscar la cedula de clientes--->
<script>
    //lista de prueba
    //var cedulas = ['cedula1', 'cedula2', 'cedula3', 'cedula4'];
    $('#search_cedula').autocomplete({
        source: function(request, response){
            $.ajax({
                url: "{{ route('search.cedulas') }}",
                dataType: 'json',
                data: {term: request.term},
                success: function(data){
                    response(data)
                }
            });
        },
        select: function(event, ui) {
            $('#search_cedula').val(ui.item.label);
            $('#selected_id').val(ui.item.value);
            return false;
        }
    });
</script>


<!--Script detalle de productos-->
<script>

    var detallesArray = [];

    $(document).ready(function() {
        autocompletado_productos();
        precio_cantidad_descuentos_act();
    });

    function autocompletado_productos(){
        $('.producto-autocomplete').autocomplete({
            source: function(request, response){
                $.ajax({
                    url: "{{ route('search.products_name') }}",
                    dataType: 'json',
                    data: {term: request.term},
                    success: function(data){
                        response(data)
                    }
                });
            },
            select: function(event, ui) {
                $(this).val(ui.item.label);
                $(this).closest('tr').find('.codigo-input').val(ui.item.value);
                var precio = ui.item.precio;
                $(this).closest('tr').find('.precio-input').val(precio);

                var maxQuantity = ui.item.stock;
                $(this).closest('tr').find('.cantidad-input').attr('data-max-quantity', maxQuantity);
                return false; 
            }
        });
    }


    function precio_cantidad_descuentos_act(){
        $('.precio-input, .cantidad-input, .descuento-input').on('input', function() {
            var row = $(this).closest('tr');
            //validacion de stock con la cantidad de productos que se quiera vender
            var inputQuantity = row.find('.cantidad-input');
            var maxQuantity = parseFloat(inputQuantity.attr('data-max-quantity')) || 0;
            var enteredQuantity = parseFloat(inputQuantity.val()) || 0;
            if (enteredQuantity > maxQuantity) {
                alert('La cantidad ingresada supera el stock disponible.');
                inputQuantity.val(maxQuantity); // Set the input to max allowed
            }

            calcularSubtotal(row);
            actualizarTotales();
        }); 
    }

    function calcularSubtotal(row) {
        var precio = parseFloat(row.find('.precio-input').val());
        var cantidad = parseFloat(row.find('.cantidad-input').val());
        var descuento = parseFloat(row.find('.descuento-input').val()) || 0;
        var subtotal = isNaN(precio) || isNaN(cantidad) ? 0 : precio * cantidad;
        var descuentoAmount = (subtotal * descuento) / 100;
        subtotal -= descuentoAmount;
        row.find('.subtotal-input').val(subtotal.toFixed(2));
        actualizarTotales();
    }


    function actualizarTotales() {
        var total = 0;
        $('.subtotal-input').each(function() {
            total += parseFloat($(this).val()) || 0;
        });
        var iva = parseFloat($('#iva').val()) || 0;
        var totalConIva = total + (total * iva / 100);

        $('#total-subtotal').val(total.toFixed(2));
        $('#total-con-iva').val(totalConIva.toFixed(2));
    }

    
    $('#iva').on('input', function() {
        var iva = parseFloat($(this).val());
        if (isNaN(iva)) iva = 0;

        var subtotal = parseFloat($('#total-subtotal').val());
        if (isNaN(subtotal)) subtotal = 0;

        var totalConIva = subtotal + (subtotal * iva / 100);
        $('#total-con-iva').val(totalConIva.toFixed(2));
    });


    function insertarFila() {
        let tblDatos = document.getElementById('tblDatos');
        let newRow = tblDatos.insertRow(-1);

        for (let i = 0; i < 8; i++) {
            let cell = newRow.insertCell(i);

            if (i === 0) {
                let btnAgregar = document.createElement('button');
                btnAgregar.setAttribute('type', 'submit');
                btnAgregar.setAttribute('class', 'btn btn-link p-0 text-success');
                btnAgregar.innerHTML = '<i class="fas fa-plus"></i>';
                btnAgregar.onclick = insertarFila;
                cell.appendChild(btnAgregar);
            } else if (i === 7) {
                let btnEliminar = document.createElement('button');
                btnEliminar.setAttribute('type', 'button');
                btnEliminar.setAttribute('class', 'btn btn-link p-0 text-danger');
                btnEliminar.innerHTML = '<i class="fas fa-trash-alt"></i>';
                btnEliminar.onclick = function() {
                    tblDatos.deleteRow(newRow.rowIndex);
                };
                cell.appendChild(btnEliminar);
            } else {
                let input = document.createElement('input');
                input.setAttribute('style', 'width: 80%;');
                input.setAttribute('type', i === 1 || i === 2 ? 'text' : 'number');
                
                if (i === 1) {
                    input.setAttribute('class', 'producto-autocomplete'); 
                    input.setAttribute('name', 'producto_id');/// id de productos
                } else if (i === 2) {
                    input.setAttribute('name', 'codigo');
                    input.setAttribute('class', 'codigo-input');
                    input.setAttribute('disabled', 'true');
                } else if (i === 3) {
                    input.setAttribute('name', 'precio');
                    input.setAttribute('class', 'precio-input');
                    input.setAttribute('disabled', 'true');
                } else if (i === 4) {
                    input.setAttribute('name', 'cantidad'); //cantidad
                    input.setAttribute('class', 'cantidad-input'); 
                } else if (i === 5) {
                    input.setAttribute('name', 'subtotal'); //subtotal
                    input.setAttribute('class', 'subtotal-input');
                    input.setAttribute('disabled', 'true');
                } else if (i === 6) {
                    input.setAttribute('name', 'descuento'); //descuento
                    input.setAttribute('class', 'descuento-input');
                }
                input.addEventListener('input', function() {
                    actualizarTotales();
                    actualizarDetallesArray();
                });
                cell.appendChild(input);
            }
        }

        autocompletado_productos();
        precio_cantidad_descuentos_act();
    }

    function actualizarDetallesArray() {
        detallesArray = [];
        
        $('.producto-autocomplete').each(function(index) {
            var row = $(this).closest('tr');
            var producto_id = $(this).data('selected-value') || '';
            var codigo = row.find('.codigo-input').val() || '';
            var precio = parseFloat(row.find('.precio-input').val()) || 0;
            var cantidad = parseFloat(row.find('.cantidad-input').val()) || 0;
            var descuento = parseFloat(row.find('.descuento-input').val()) || 0;
            var subtotal = (precio * cantidad) - (precio * cantidad * descuento / 100);
            
            detallesArray.push({
                producto_id: codigo,
                cantidad: cantidad,
                subtotal: subtotal,
                descuento: descuento
            });
        });

        $('#detalles').val(JSON.stringify(detallesArray));
    }
</script>
@stop
