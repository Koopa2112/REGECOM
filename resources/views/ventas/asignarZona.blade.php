@extends((Auth::user()->puesto_empleado == 0) ? 'inicios.admin' : 
        ((Auth::user()->puesto_empleado == 1) ? 'inicios.supervisor' : 
        ((Auth::user()->puesto_empleado == 7) ? 'inicios.repartidor' : 'inicios.logistica')))

@section('title', 'Asignación de zona')

@section('contenido')

<main>

    <div class="container py-4">
        <h2>Asignación de zona</h2>

        @if ($errors->any())


        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @endif


        <div>
            <div class="mb-3 row">
                <label for="linea_venta" class="col-sm-2 col-form-label">Linea del cliente</label>
                <div class="col-sm-5">
                    <input type="tel" class="form-control-plaintext" name="linea_venta" id="linea_venta"
                        value="{{$venta->linea_venta}}" readonly>
                </div>
            </div>
            <form action="{{ url('ventas/' . $venta->id . '/zonaAsignada') }}" method="post" id="asignacionZona" >
                @csrf
                <div class="mb-3 row">
                    <label for="id_zona" class="col-sm-2 col-form-label">Zona asignada</label>
                    <div class="col-sm-5">
                        <select name="id_zona" class="form-select" id="id_zona" required>
                            <option disabled selected>Seleccionar...</option>

                            @foreach($zonas as $zona)
                            <option value="{{ $zona->id }}">
                                {{  ($zona->nombre_zona) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>


            <div class="mb-3 row">
                <label for="nombre_cliente" class="col-sm-2 col-form-label">Nombre del cliente</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control-plaintext" name="nombre_cliente" id="nombre_cliente"
                        value="{{$venta->nombre_cliente}}" readonly>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="calle_entrega" class="col-sm-2 col-form-label">Calle: </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control-plaintext" name="calle_entrega" id="calle_entrega"
                        value="{{$venta->calle_entrega}}" readonly>

                </div>
            </div>
            <div class="mb-3 row">
                <label for="numero_entrega" class="col-sm-2 col-form-label">Número: </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control-plaintext" name="numero_entrega" id="numero_entrega"
                        value="{{$venta->numero_entrega}}" readonly>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="colonia_entrega" class="col-sm-2 col-form-label">Colonia: </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control-plaintext" name="colonia_entrega" id="colonia_entrega"
                        value="{{$venta->colonia_entrega}}" rows="3" readonly></textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="municipio_entrega" class="col-sm-2 col-form-label">Municipio: </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control-plaintext" name="municipio_entrega" id="municipio_entrega"
                        value="{{$venta->municipio_entrega}}" rows="3" readonly></textarea>

                </div>
            </div>


            <div class="mb-3 row">
                <label for="referencia_entrega" class="col-sm-2 col-form-label">Referencias: </label>
                <div class="col-sm-5">
                    <textarea class="form-control-plaintext" name="referencia_entrega" id="municipio_entrega" rows="3"
                        readonly>{{$venta->referencia_entrega}}</textarea>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="url_maps" class="col-sm-2 col-form-label">URL de google maps</label>
                <div class="col-sm-5">
                    <a href="{{$venta->url_maps}}" class="form-control-plaintext" name="url_maps" id="url_maps"
                        readonly>{{$venta->url_maps}}</a>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="notas_vendedor" class="col-sm-2 col-form-label">Notas</label>
                <div class="col-sm-5">
                    <textarea class="form-control-plaintext" name="notas_vendedor" id="notas_vendedor"
                        readonly>{{$venta->notas_vendedor}}</textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="notas_MC" class="col-sm-2 col-form-label">Notas Mesa de control</label>
                <div class="col-sm-5">
                    <textarea class="form-control-plaintext" name="notas_MC" id="notas_MC"
                        readonly>{{$venta->notas_MC}}</textarea>
                </div>
            </div>


            <br>

            <a href="{{ url()->previous()}}" class="btn btn-secondary">Regresar</a>

            <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>

            <script>
            document.getElementById('btnGuardar').addEventListener('click', function() {
                // Muestra un cuadro de diálogo de confirmación
                var confirmacion = confirm('¿Estás seguro de que deseas registrar la venta?');

                // Si el usuario hace clic en "Aceptar", se enviará el formulario
                if (confirmacion) {
                    document.getElementById('asignacionZona').submit();
                }

            });
            </script>

        </div>


</main>

@stop