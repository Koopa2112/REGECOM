@extends('inicios/asesor')

@section('title', 'Registrar Venta')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Registrar venta</h2>

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

        <form action="{{ url('ventas') }}" method="post" id="registrarVenta">

            @csrf

            <div class="mb-3 row">
                <label for="linea_venta" class="col-sm-2 col-form-label">Linea del cliente</label>
                <div class="col-sm-5">
                    <input type="tel" class="form-control" name="linea_venta" id="linea_venta"
                        value="{{old ('linea_venta')}}" required>
                    <div id="message-box" class="message-box"></div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nombre_cliente" class="col-sm-2 col-form-label">Nombre del cliente</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nombre_cliente" id="nombre_cliente"
                        value="{{old ('nombre_cliente')}}" required>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="plan_venta" class="col-sm-2 col-form-label">Plan</label>
                <div class="col-sm-5">
                    <select class="form-control" name="plan_venta" id="plan_venta">
                        <option disabled selected>Seleccionar...</option>
                        <option value="Telcel Plus 1" @if(old ('plan_venta')=='Telcel Plus 1' ) selected @endif> Telcel
                            Plus 1</option>
                        <option value="Telcel Plus 1.5" @if(old ('plan_venta')=='Telcel Plus 1.5' ) selected @endif>
                            Telcel Plus 1.5</option>
                        <option value="Telcel Plus 2" @if(old ('plan_venta')=='Telcel Plus 2' ) selected @endif> Telcel
                            Plus 2</option>
                        <option value="Telcel Plus 3" @if(old ('plan_venta')=='Telcel Plus 3' ) selected @endif> Telcel
                            Plus 3</option>
                        <option value="Telcel Plus 4" @if(old ('plan_venta')=='Telcel Plus 4' ) selected @endif> Telcel
                            Plus 4</option>
                        <option value="Telcel Plus 5" @if(old ('plan_venta')=='Telcel Plus 5' ) selected @endif> Telcel
                            Plus 5</option>
                        <option value="Telcel Plus 6" @if(old ('plan_venta')=='Telcel Plus 6' ) selected @endif> Telcel
                            Plus 6</option>
                        <option value="Telcel Plus 7" @if(old ('plan_venta')=='Telcel Plus 7' ) selected @endif> Telcel
                            Plus 7</option>
                        <option value="Telcel Plus 8" @if(old ('plan_venta')=='Telcel Plus 8' ) selected @endif> Telcel
                            Plus 8</option>
                        <option value="Telcel Plus 9" @if(old ('plan_venta')=='Telcel Plus 9' ) selected @endif> Telcel
                            Plus 9</option>
                        <option value="Telcel Plus 1 CC" @if(old ('plan_venta')=='Telcel Plus 1 CC' ) selected @endif>
                            Telcel Plus 1 CC</option>
                        <option value="Telcel Plus 1.5 CC" @if(old ('plan_venta')=='Telcel Plus 1.5 CC' ) selected
                            @endif> Telcel Plus 1.5 CC</option>
                        <option value="Telcel Plus 2 CC" @if(old ('plan_venta')=='Telcel Plus 2CC' ) selected @endif>
                            Telcel Plus 2 CC</option>
                        <option value="Telcel Plus 3 CC" @if(old ('plan_venta')=='Telcel Plus 3 CC' ) selected @endif>
                            Telcel Plus 3CC</option>
                        <option value="Telcel Plus 4 CC" @if(old ('plan_venta')=='Telcel Plus 4 CC' ) selected @endif>
                            Telcel Plus 4 CC</option>
                        <option value="Telcel Plus 5 CC" @if(old ('plan_venta')=='Telcel Plus 5 CC' ) selected @endif>
                            Telcel Plus 5 CC</option>
                        <option value="Telcel Plus 6 CC" @if(old ('plan_venta')=='Telcel Plus 6 CC' ) selected @endif>
                            Telcel Plus 6 CC</option>
                        <option value="Telcel Plus 7 CC" @if(old ('plan_venta')=='Telcel Plus 7 CC' ) selected @endif>
                            Telcel Plus 7 CC</option>
                        <option value="Telcel Plus 8 CC" @if(old ('plan_venta')=='Telcel Plus 8 CC' ) selected @endif>
                            Telcel Plus 8 CC</option>
                        <option value="Telcel Plus 9 CC" @if(old ('plan_venta')=='Telcel Plus 9 CC' ) selected @endif>
                            Telcel Plus 9 CC</option>
                        <option value="Telcel Plus 1 MPP" @if(old ('plan_venta')=='Telcel Plus 1 MPP' ) selected @endif>
                            Telcel Plus 1 MPP</option>
                        <option value="Telcel Plus 1.5 MPP" @if(old ('plan_venta')=='Telcel Plus 1.5 MPP' ) selected
                            @endif> Telcel Plus 1.5 MPP</option>
                        <option value="Telcel Plus 2 MPP" @if(old ('plan_venta')=='Telcel Plus 2 MPP' ) selected @endif>
                            Telcel Plus 2 MPP</option>
                        <option value="Telcel Plus 3 MPP" @if(old ('plan_venta')=='Telcel Plus 3 MPP' ) selected @endif>
                            Telcel Plus 3 MPP</option>
                        <option value="Telcel Plus 4 MPP" @if(old ('plan_venta')=='Telcel Plus 4 MPP' ) selected @endif>
                            Telcel Plus 4 MPP</option>
                        <option value="Telcel Plus 5 MPP" @if(old ('plan_venta')=='Telcel Plus 5 MPP' ) selected @endif>
                            Telcel Plus 5 MPP</option>
                        <option value="Telcel Plus 6 MPP" @if(old ('plan_venta')=='Telcel Plus 6 MPP' ) selected @endif>
                            Telcel Plus 6 MPP</option>
                        <option value="Telcel Plus 7 MPP" @if(old ('plan_venta')=='Telcel Plus 7 MPP' ) selected @endif>
                            Telcel Plus 7 MPP</option>
                        <option value="Telcel Plus 8 MPP" @if(old ('plan_venta')=='Telcel Plus 8 MPP' ) selected @endif>
                            Telcel Plus 8 MPP</option>
                        <option value="Telcel Plus 9 MPP" @if(old ('plan_venta')=='Telcel Plus 9 MPP' ) selected @endif>
                            Telcel Plus 9 MPP</option>
                        <option value="Telcel Plus 1 MPP CC" @if(old ('plan_venta')=='Telcel Plus 1 MPP CC' ) selected
                            @endif> Telcel Plus 1 MPP CC</option>
                        <option value="Telcel Plus 1.5 MPP CC" @if(old ('plan_venta')=='Telcel Plus 1.5 MPP CC' )
                            selected @endif> Telcel Plus 1.5 MPP CC</option>
                        <option value="Telcel Plus 2 MPP CC" @if(old ('plan_venta')=='Telcel Plus 2 MPP CC' ) selected
                            @endif> Telcel Plus 2 MPP CC</option>
                        <option value="Telcel Plus 3 MPP CC" @if(old ('plan_venta')=='Telcel Plus 3 MPP CC' ) selected
                            @endif> Telcel Plus 3 MPP CC</option>
                        <option value="Telcel Plus 4 MPP CC" @if(old ('plan_venta')=='Telcel Plus 4 MPP CC' ) selected
                            @endif> Telcel Plus 4 MPP CC</option>
                        <option value="Telcel Plus 5 MPP CC" @if(old ('plan_venta')=='Telcel Plus 5 MPP CC' ) selected
                            @endif> Telcel Plus 5 MPP CC</option>
                        <option value="Telcel Plus 6 MPP CC" @if(old ('plan_venta')=='Telcel Plus 6 MPP CC' ) selected
                            @endif> Telcel Plus 6 MPP CC</option>
                        <option value="Telcel Plus 7 MPP CC" @if(old ('plan_venta')=='Telcel Plus 7 MPP CC' ) selected
                            @endif> Telcel Plus 7 MPP CC</option>
                        <option value="Telcel Plus 8 MPP CC" @if(old ('plan_venta')=='Telcel Plus 8 MPP CC' ) selected
                            @endif> Telcel Plus 8 MPP CC</option>
                        <option value="Telcel Plus 9 MPP CC" @if(old ('plan_venta')=='Telcel Plus 9 MPP CC' ) selected
                            @endif> Telcel Plus 9 MPP CC</option>

                    </select>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="meses_venta" class="col-sm-2 col-form-label">Meses</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" name="meses_venta" id="meses_venta"
                        value="{{old ('meses_venta')}}">

                </div>
            </div>

            <div class="mb-3 row">
                <label for="marca_equipo" class="col-sm-2 col-form-label">Marca equipo</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="marca_equipo" id="marca_equipo"
                        value="{{old ('marca_equipo')}}" required>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="modelo_equipo" class="col-sm-2 col-form-label">Modelo del equipo</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="modelo_equipo" id="modelo_equipo"
                        value="{{old ('modelo_equipo')}}" required>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="calle_entrega" class="col-sm-2 col-form-label">Calle: </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="calle_entrega" id="calle_entrega"
                        value="{{old ('calle_entrega')}}" required>

                </div>
            </div>
            <div class="mb-3 row">
                <label for="numero_entrega" class="col-sm-2 col-form-label">Número: </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="numero_entrega" id="numero_entrega"
                        value="{{old ('numero_entrega')}}" required>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="colonia_entrega" class="col-sm-2 col-form-label">Colonia: </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="colonia_entrega" id="colonia_entrega"
                        value="{{old ('colonia_entrega')}}" rows="3" required></textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="municipio_entrega" class="col-sm-2 col-form-label">Municipio: </label>
                <div class="col-sm-5">
                    <select class="form-control" name="municipio_entrega" id="municipio_entrega">
                        <option disabled selected>Seleccionar...</option>
                        <option value="Apodaca"> Apodaca</option>
                        <option value="Cumbres"> Cumbres</option>
                        <option value="García"> García</option>
                        <option value="San Pedro Garza García"> San Pedro Garza García</option>
                        <option value="General Escobedo"> General Escobedo</option>
                        <option value="Guadalupe"> Guadalupe</option>
                        <option value="Ciudad Benito Juárez"> Ciudad Benito Juárez</option>
                        <option value="Monterrey"> Monterrey</option>
                        <option value="San Nicolás de los Garza"> San Nicolás de los Garza</option>
                        <option value="Santa Catarina"> Santa Catarina</option>
                    </select>

                </div>
            </div>


            <div class="mb-3 row">
                <label for="referencia_entrega" class="col-sm-2 col-form-label">Referencias y notas para logística</label>
                <div class="col-sm-5">
                    <textarea class="form-control" name="referencia_entrega" id="referencia_entrega" rows="5"
                        required placeholder="CODIGO POSTAL, entre calles, puntos de referencia, collor de fachada, Etc.">{{old ('referencia_entrega')}}</textarea>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="url_maps" class="col-sm-2 col-form-label">URL de google maps</label>
                <div class="col-sm-5">
                    <input required type="url" class="form-control" name="url_maps" id="url_maps"
                        value="{{old ('url_maps')}}">

                </div>
            </div>

            <div class="mb-3 row">
                <label for="total_mensual" class="col-sm-2 col-form-label">Total mensual</label>
                <div class="col-sm-5">
                    <div class="col-sm-3 input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2">$</span>
                        </div>
                        <input required type="text" class="form-control" name="total_mensual" id="total_mensual"
                            required value="{{old ('total_mensual')}}">
                    </div>
                </div>

            </div>


            <div class="mb-3 row">
                <label for="notas_vendedor" class="col-sm-2 col-form-label">Agregar notas para Mesa de controll</label>
                <div class="col-sm-5">
                    <textarea class="form-control" name="notas_vendedor" id="notas_vendedor" rows="3"
                        required placeholder="Información adicional a lo anterior">{{old ('notas_vendedor')}}</textarea>
                </div>
            </div>

            <a href="{{ url('inicio') }}" class="btn btn-secondary">Regresar</a>


            <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>

            <script>
                document.getElementById('btnGuardar').addEventListener('click', function() {
                    // Obtener el valor del campo de referencia
                    let reference = document.getElementById('referencia_entrega').value;

                    // Expresión regular para validar el código postal (5 dígitos)
                    let postalCodePattern = /\b\d{5}\b/;

                    // Verificar si el código postal es válido
                    if (postalCodePattern.test(reference)) {
                        // Evitar que el formulario se envíe
                        // Muestra un cuadro de diálogo de confirmación
                        var confirmacion = confirm('¿Estás seguro de que deseas registrar la venta?');
                        // Si el usuario hace clic en "Aceptar", se enviará el formulario
                        if (confirmacion) {
                            document.getElementById('registrarVenta').submit();
                        }
                        // Mostrar el mensaje de error
                    } else {
                        // Ocultar el mensaje de error si el código postal es válido
                        alert("Es necesario introducir el Código Postal")
                    }


                });
            </script>

        </form>

    </div>
</main>

<script>
    $(document).ready(function() {
        $('#linea_venta').on('blur', function() {
            var linea_venta = $(this).val();
            $.ajax({
                url: "{{ route('check.line') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    linea_venta: linea_venta
                },
                success: function(response) {
                    var input = document.getElementById('linea_venta')
                    var messageBox = document.getElementById('message-box');
                    if (response.exists) {
                        input.style.borderColor = '#FF0000';
                        input.classList.add('vibrate'); // Añadir la clase de vibración
                        setTimeout(function() {
                            input.classList.remove('vibrate'); // Eliminar la clase después de la animación
                        }, 200);
                        messageBox.innerHTML = "¡ATENCION! Esta línea ha sido registrada el: " + response.venta +
                            ", con el ID: " + response.id +
                            ". Por favor, valida que ya este cerrada esa venta antes de continuar";
                        messageBox.style.display = 'block';
                    } else {
                        input.style.borderColor = '#00ff00';
                        messageBox.style.display = 'none';
                    }
                },
                error: function(xhr) {
                    alert("Error en la consulta, favor de actualizar")
                }
            });
        });
    });
</script>

<script>
    $("#total_mensual").on({
        "focus": function(event) {
            $(event.target).select();
        },
        "keyup": function(event) {
            $(event.target).val(function(index, value) {
                return value.replace(/\D/g, "")
                    //.replace(/([0-9])([0-9]{2})$/, '$1.$2')
                    .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");

            });
        }
    });
</script>

<style>
    /* Define la animación de vibración */
    @keyframes vibrate {

        0%,
        100% {
            transform: translateX(0);
        }

        20%,
        60% {
            transform: translateX(-5px);
        }

        40%,
        80% {
            transform: translateX(5px);
        }
    }

    /* Clase que aplicará la animación */
    .vibrate {
        animation: vibrate 0.2s linear;
    }

    .message-box {
        display: none;
        margin-top: 5px;
        padding: 10px;
        border: 1px solid #FF0000;
        background-color: #FFECEC;
        color: #FF0000;
        border-radius: 5px;
        position: absolute;
        z-index: 1000;
    }
</style>



@stop