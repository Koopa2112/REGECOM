@extends('inicios/asesor')

@section('title', 'Registrar fecha')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Registrar fecha</h2>

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

        <form action="{{ url('ventas/' .$venta. '/saveDate') }}" method="post" id="registrarFecha">

            @csrf

            <div class="mb-3 row">
                <label for="fecha_entrega" class="col-sm-2 col-form-label">Fecha de entrega</label>
                <div class="col-sm-5">
                    <select name="fecha_entrega" class="form-select" id="fecha_entrega" required>
                        <option disabled selected>Seleccionar...</option>

                        @foreach($fechas_entrega as $fecha_entrega)
                        <option value="{{ $fecha_entrega->id }}">
                            {{ date("d M Y", strtotime($fecha_entrega->fecha_entrega)) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <a href="{{ url('ventas/curso') }}" class="btn btn-secondary">Regresar</a>


            <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>

            <script>
            document.getElementById('btnGuardar').addEventListener('click', function() {
                // Muestra un cuadro de diálogo de confirmación
                var confirmacion = confirm('¿Estás seguro de que deseas registrar la fecha?');

                // Si el usuario hace clic en "Aceptar", se enviará el formulario
                if (confirmacion) {
                    document.getElementById('registrarFecha').submit();
                }

            });
            </script>

        </form>

    </div> <br>
    <div class="container py-4" style="margin-top: 18%">

        <form action="{{ url('ventas/' .$venta. '/cancel') }}" method="post" id="cancelarVenta">

            @csrf

            <div class="mb-3 row">

                <div class="col-sm-5">
                    <button type="button" class="btn btn-danger" id="btnCancelar">CANCELAR VENTA</button>

                    <script>
                    document.getElementById('btnCancelar').addEventListener('click', function() {
                        // Muestra un cuadro de diálogo de confirmación
                        var confirmacion = confirm(
                            '¿Estás seguro de que deseas cancelar la venta? No podrás deshacer esta acción');

                        // Si el usuario hace clic en "Aceptar", se enviará el formulario
                        if (confirmacion) {
                            document.getElementById('cancelarVenta').submit();
                        }

                    });
                    </script>

                </div>
            </div>

        </form>
    </div>
</main>

@stop