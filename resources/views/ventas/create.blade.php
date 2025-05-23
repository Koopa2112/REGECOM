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
                        <option value="Telcel Libre 1 $249" @if(old ('plan_venta')=='Telcel Libre 1 $249' ) selected @endif> Telcel
                            Libre 1 $249</option>
                        <option value="Telcel Libre 2 $319" @if(old ('plan_venta')=='Telcel Libre 2 $319' ) selected @endif>
                            Telcel Libre 2 $319</option>
                        <option value="Telcel Libre 3 $399" @if(old ('plan_venta')=='Telcel Libre 3 $399' ) selected @endif> Telcel
                            Libre 3 $399</option>
                        <option value="Telcel Libre 4 $499" @if(old ('plan_venta')=='Telcel Libre 4 $499' ) selected @endif> Telcel
                            Libre 4 $499</option>
                        <option value="Telcel Libre 5 $599" @if(old ('plan_venta')=='Telcel Libre 5 $599' ) selected @endif> Telcel
                            Libre 5 $599</option>
                        <option value="Telcel Libre 6 $699" @if(old ('plan_venta')=='Telcel Libre 6 $699' ) selected @endif> Telcel
                            Libre 6 $699</option>
                        <option value="Telcel Libre 7 $799" @if(old ('plan_venta')=='Telcel Libre 7 $799' ) selected @endif> Telcel
                            Libre 7 $799</option>
                        <option value="Telcel Libre 9 $999" @if(old ('plan_venta')=='Telcel Libre 9 $999' ) selected @endif> Telcel
                            Libre 9 $999</option>
                        <option value="Telcel Libre 12 $1,299" @if(old ('plan_venta')=='Telcel Libre 12 $1,299' ) selected @endif> Telcel
                            Libre 12 $1,299</option>
                        <option value="Telcel Libre $1,499 VIP" @if(old ('plan_venta')=='Telcel Libre $1,499 VIP' ) selected @endif> Telcel
                            Libre $1,499 VIP</option>

                        <option value="Telcel Libre 1 $299 CC" @if(old ('plan_venta')=='Telcel Libre 1 $299 CC' ) selected @endif>
                            Telcel Libre 1 $299 CC</option>
                        <option value="Telcel Libre 2 $369 CC" @if(old ('plan_venta')=='Telcel Libre 2 $369 CC' ) selected
                            @endif> Telcel Libre 2 $369 CC</option>
                        <option value="Telcel Libre 3 $449 CC" @if(old ('plan_venta')=='Telcel Libre 3 $449 CC' ) selected @endif>
                            Telcel Libre 3 $449 CC</option>
                        <option value="Telcel Libre 4 $549 CC" @if(old ('plan_venta')=='Telcel Libre 4 $549 CC' ) selected @endif>
                            Telcel Libre 4 $549 CC</option>
                        <option value="Telcel Libre 5 $699 CC" @if(old ('plan_venta')=='Telcel Libre 5 $699 CC' ) selected @endif>
                            Telcel Libre 5 $699 CC</option>
                        <option value="Telcel Libre 6 $799 CC" @if(old ('plan_venta')=='Telcel Libre 6 $799 CC' ) selected @endif>
                            Telcel Libre 6 $799 CC</option>
                        <option value="Telcel Libre 7 $899 CC" @if(old ('plan_venta')=='Telcel Libre 7 $899 CC' ) selected @endif>
                            Telcel Libre 7 $899 CC</option>
                        <option value="Telcel Libre 9 $1099 CC" @if(old ('plan_venta')=='Telcel Libre 9 $1099 CC' ) selected @endif>
                            Telcel Libre 9 $1099 CC</option>
                        <option value="Telcel Libre 12 $1,399 CC" @if(old ('plan_venta')=='Telcel Libre 12 $1,399 CC' ) selected @endif>
                            Telcel Libre 12 $1,399 CC</option>
                        <option value="Telcel Libre VIP $1599 CC" @if(old ('plan_venta')=='Telcel Libre VIP $1599 CC' ) selected @endif>
                            Telcel Libre VIP $1599 CC</option>

                        <!--<option value="Telcel Libre 1 $249MPP" @if(old ('plan_venta')=='Telcel Libre 1 $249MPP' ) selected @endif>
                            Telcel Libre 1 $249MPP</option>
                        <option value="Telcel Libre 2 $319 MPP" @if(old ('plan_venta')=='Telcel Libre 2 $319 MPP' ) selected
                            @endif> Telcel Libre 2 $319 MPP</option>
                        <option value="Telcel Libre 3 $399 MPP" @if(old ('plan_venta')=='Telcel Libre 3 $399 MPP' ) selected @endif>
                            Telcel Libre 3 $399 MPP</option>
                        <option value="Telcel Libre 4 $499 MPP" @if(old ('plan_venta')=='Telcel Libre 4 $499 MPP' ) selected @endif>
                            Telcel Libre 4 $499 MPP</option>
                        <option value="Telcel Libre 5 $599 MPP" @if(old ('plan_venta')=='Telcel Libre 5 $599 MPP' ) selected @endif>
                            Telcel Libre 5 $599 MPP</option>
                        <option value="Telcel Libre 6 $699 MPP" @if(old ('plan_venta')=='Telcel Libre 6 $699 MPP' ) selected @endif>
                            Telcel Libre 6 $699 MPP</option>
                        <option value="Telcel Libre 7 $799 MPP" @if(old ('plan_venta')=='Telcel Libre 7 $799 MPP' ) selected @endif>
                            Telcel Libre 7 $799 MPP</option>
                        <option value="Telcel Libre 9 $999 MPP" @if(old ('plan_venta')=='Telcel Libre 9 $999 MPP' ) selected @endif>
                            Telcel Libre 9 $999 MPP</option>
                        <option value="Telcel Libre 12 $1,299 MPP" @if(old ('plan_venta')=='Telcel Libre 12 $1,299 MPP' ) selected @endif>
                            Telcel Libre 12 $1,299 MPP</option>
                        <option value="Telcel Libre VIP MPP" @if(old ('plan_venta')=='Telcel Libre VIP MPP' ) selected @endif>
                            Telcel Libre VIP MPP</option>

                        <option value="Telcel Libre 1 $249MPP CC" @if(old ('plan_venta')=='Telcel Libre 1 $249MPP CC' ) selected
                            @endif> Telcel Libre 1 $249MPP CC</option>
                        <option value="Telcel Libre 2 $319 MPP CC" @if(old ('plan_venta')=='Telcel Libre 2 $319 MPP CC' )
                            selected @endif> Telcel Libre 2 $319 MPP CC</option>
                        <option value="Telcel Libre 3 $399 MPP CC" @if(old ('plan_venta')=='Telcel Libre 3 $399 MPP CC' ) selected
                            @endif> Telcel Libre 3 $399 MPP CC</option>
                        <option value="Telcel Libre 4 $499 MPP CC" @if(old ('plan_venta')=='Telcel Libre 4 $499 MPP CC' ) selected
                            @endif> Telcel Libre 4 $499 MPP CC</option>
                        <option value="Telcel Libre 5 $599 MPP CC" @if(old ('plan_venta')=='Telcel Libre 5 $599 MPP CC' ) selected
                            @endif> Telcel Libre 5 $599 MPP CC</option>
                        <option value="Telcel Libre 6 $699 MPP CC" @if(old ('plan_venta')=='Telcel Libre 6 $699 MPP CC' ) selected
                            @endif> Telcel Libre 6 $699 MPP CC</option>
                        <option value="Telcel Libre 7 $799 MPP CC" @if(old ('plan_venta')=='Telcel Libre 7 $799 MPP CC' ) selected
                            @endif> Telcel Libre 7 $799 MPP CC</option>
                        <option value="Telcel Libre 9 $999 MPP CC" @if(old ('plan_venta')=='Telcel Libre 9 $999 MPP CC' ) selected
                            @endif> Telcel Libre 9 $999 MPP CC</option>
                        <option value="Telcel Libre 12 $1,299 MPP CC" @if(old ('plan_venta')=='Telcel Libre 12 $1,299 MPP CC' ) selected
                            @endif> Telcel Libre 12 $1,299 MPP CC</option>
                        <option value="Telcel Libre VIP MPP CC" @if(old ('plan_venta')=='Telcel Libre VIP MPP CC' ) selected
                            @endif> Telcel Libre VIP MPP CC</option> -->

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
                <label for="promocion" class="col-sm-2 col-form-label">Promocion</label>
                <div class="col-sm-5">
                    <input type="checkbox" class="form-check-input" name="promocion" id="promocion"
                        value="{{old ('promocion')}}" required>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="promocion2" class="col-sm-2 col-form-label">Arrendamiento</label>
                <div class="col-sm-5">
                    <input type="checkbox" class="form-check-input" name="promocion2" id="promocion2"
                        value="{{old ('promocion2')}}" required>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="promocion3" class="col-sm-2 col-form-label">Financiamiento</label>
                <div class="col-sm-5">
                    <input type="checkbox" class="form-check-input" name="promocion3" id="promocion3"
                        value="{{old ('promocion3')}}" required>

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
                        <option value="Allende"> Allende</option>
                        <option value="Apodaca"> Apodaca</option>
                        <option value="Cadereyta"> Cadereyta</option>
                        <option value="Cumbres"> Cumbres</option>
                        <option value="García"> García</option>
                        <option value="San Pedro Garza García"> San Pedro Garza García</option>
                        <option value="General Escobedo"> General Escobedo</option>
                        <option value="Guadalupe"> Guadalupe</option>
                        <option value="Ciudad Benito Juárez"> Ciudad Benito Juárez</option>
                        <option value="Montemorelos"> Montemorelos</option>
                        <option value="Monterrey"> Monterrey</option>
                        <option value="San Nicolás de los Garza"> San Nicolás de los Garza</option>
                        <option value="Santa Catarina"> Santa Catarina</option>
                        <option value="Santiago"> Santiago</option>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const checkboxes = [
            document.getElementById("promocion"),
            document.getElementById("promocion2"),
            document.getElementById("promocion3")
        ];
        const marcaEquipo = document.getElementById("marca_equipo");
        const modeloEquipo = document.getElementById("modelo_equipo");

        const marcaRow = marcaEquipo.parentElement.parentElement;
        const modeloRow = modeloEquipo.parentElement.parentElement;

        function actualizarCampos() {
            const algunoSeleccionado = checkboxes.some(cb => cb.checked);

            if (algunoSeleccionado) {
                marcaRow.style.display = "none";
                modeloRow.style.display = "none";
                marcaEquipo.removeAttribute("required");
                modeloEquipo.removeAttribute("required");
            } else {
                marcaRow.style.display = "flex";
                modeloRow.style.display = "flex";
                marcaEquipo.setAttribute("required", "required");
                modeloEquipo.setAttribute("required", "required");
            }
        }

        // Evento para cada checkbox
        checkboxes.forEach(cb => {
            cb.addEventListener("change", function() {
                if (this.checked) {
                    // Desmarcar todos los demás checkboxes
                    checkboxes.forEach(otherCb => {
                        if (otherCb !== this) {
                            otherCb.checked = false;
                        }
                    });
                }
                // Actualizar la vista
                actualizarCampos();
            });
        });
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