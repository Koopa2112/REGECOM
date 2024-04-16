@extends('inicios/analista')

@section('title', 'Contrato de venta')

@section('contenido')

<main>

    <div class="container py-4">
        <h2>Contrato de venta</h2>

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


        <form action="{{ url('ventas/' . $venta->id .'/analisis') }}" method="post" id="analizarVenta">

            @csrf

            <div class="mb-3 row">
                <label for="linea_venta" class="col-sm-2 col-form-label">Linea del cliente</label>
                <div class="col-sm-5">
                    <input type="tel" class="form-control-plaintext" name="linea_venta" id="linea_venta"
                        value="{{$venta->linea_venta}}" readonly>

                </div>
            </div>

            <div class="mb-3 row">
                <input type="hidden" name="id_equipo" id="id_equipo">
                <label for="equipo" class="col-sm-2 col-form-label">Equipo</label>
                <div class="col-sm-5">
                    <select name="equipo" class="form-select" id="equipo" required>
                        <option disabled selected>Seleccionar...</option>

                        @foreach($equipos as $equipo)
                        <option value="{{ $equipo }}">
                            {{  ($equipo->imei) }}</option>

                        @endforeach
                    </select>

                </div>

                <div id="info_equipo" , class="col-sm-5">

                </div>

                <script>
                // Obtenemos el elemento select y el contenedor de información
                var select = document.getElementById('equipo');
                var infoContainer = document.getElementById('info_equipo');
                var equipo = document.getElementById('id_equipo');

                // Evento de cambio en el select
                select.addEventListener('change', function() {
                    var selectedOption = JSON.parse(select.value);
                    // Lógica para mostrar información relacionada
                    infoContainer.innerHTML = '<h3>Marca: ' + selectedOption.marca_equipo + '</h3>';
                    infoContainer.innerHTML += '<h3>Modelo: ' + selectedOption.modelo_equipo + '</h3>';
                    equipo.value = parseInt(selectedOption.id, 10);
                });
                </script>
            </div>

            <div class="mb-3 row">
                <label for="fecha_entrega" class="col-sm-2 col-form-label">Fecha de entrega</label>
                <div class="col-sm-5">
                    <input style="background-color:yellow" type="tel" class="form-control-plaintext"
                        name="fecha_entrega" id="fecha_entrega"
                        value="{{ date( 'd M Y', strtotime( $venta->ruta->fecha_entrega)) }} " readonly>


                </div>
            </div>

            <div class="mb-3 row">
                <label for="nombre_cliente" class="col-sm-2 col-form-label">Nombre del cliente</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control-plaintext" name="nombre_cliente" id="nombre_cliente"
                        value="{{$venta->nombre_cliente}}" readonly>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="plan_venta" class="col-sm-2 col-form-label">Plan</label>
                <div class="col-sm-5">
                    <input type="plan_venta" class="form-control-plaintext" name="plan_venta" id="plan_venta"
                        value="{{$venta->plan_venta}}" readonly>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="meses_venta" class="col-sm-2 col-form-label">Meses</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control-plaintext" name="meses_venta" id="meses_venta"
                        value="{{$venta->meses_venta}}" readonly>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="marca_equipo" class="col-sm-2 col-form-label">Marca equipo</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control-plaintext" name="marca_equipo" id="marca_equipo"
                        value="{{$venta->marca_equipo}}" readonly>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="modelo_equipo" class="col-sm-2 col-form-label">Modelo del equipo</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control-plaintext" name="modelo_equipo" id="modelo_equipo"
                        value="{{$venta->modelo_equipo}}" readonly>

                </div>
            </div>




            <div class="mb-3 row">
                <label for="total_mensual" class="col-sm-2 col-form-label">Total mensual</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control-plaintext" name="total_mensual" id="total_mensual"
                        value="{{$total_mensual}}" readonly>

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
                <label for="notas_analista" class="col-sm-2 col-form-label">Notas</label>
                <div class="col-sm-5">
                    <textarea class="form-control" name="notas_analista"
                        id="notas_analista">{{$venta->notas_MC}}</textarea>
                </div>
            </div>

            <input type="hidden" class="form-hidden" name="estado" id="estado" value="">

                        </div>

                <div class="col-sm-5">
                    <div class="col-sm">
                        <button type="button" style="flex-grow: 10" class="btn btn-danger btn-lg" id="btnRechazar"
                            onclick="guardar(3)">Contrato no impreso</button>
                    </div >

                    <br>
                    <div class="col-sm">
                        <button type="button" style="flex-grow: 10" class="btn btn-success btn-lg" id="btnAceptar"
                            onclick="guardar(7)">Contrato impreso</button>
                    </div>


                    <script>
                    function guardar(estado) {
                        // Muestra un cuadro de diálogo de confirmación
                        if (estado == 3) {
                            var confirmacion = confirm('¿Estás seguro de que deseas marcar problemas con la venta?');
                        } else if (estado == 7) {
                            var confirmacion = confirm('¿Estás seguro de que deseas proceder con la venta?');
                        }
                        // Si el usuario hace clic en "Aceptar", se enviará el formulario
                        if (confirmacion) {

                            document.getElementById("estado").value = estado

                            document.getElementById("analizarVenta").submit();
                        }
                    }
                    </script>
        </form>
        <br><br>

        <a href="{{ url()->previous()}}" class="btn btn-secondary">Regresar</a>

    </div>


</main>

@stop