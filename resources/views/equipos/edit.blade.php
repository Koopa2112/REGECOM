@extends('inicios/almacen')

@section('title', 'Editar equipo')

@section('contenido')




<div class="container py-4">
    <h2>Editar equipo</h2>

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

    <br>

    <form id="actualizarEquipo" action="{{ url('equipos/'.$equipo->id)}}" method="post">
        @method("PUT")
        @csrf

        <div class="mb-3 row">
            <label for="marca" class="col-sm-2 col-form-label">Marca</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="marca" id="marca" value="{{$equipo->marca_equipo}}"
                    required>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="modelo" class="col-sm-2 col-form-label">Modelo</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="modelo" id="modelo" value="{{$equipo->modelo_equipo}}"
                    required>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="textoEntrada" class="col-sm-2 col-form-label">IMEI</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="imei" name="imei" value="{{$equipo->imei}}">
            </div>
        </div>
        <a href="{{ url('equipos/inventario') }}" class="btn btn-secondary">Regresar</a>
        <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>

        <script>
        document.getElementById('btnGuardar').addEventListener('click', function() {
            // Muestra un cuadro de diálogo de confirmación
            var confirmacion = confirm('¿Estás seguro de que deseas actualizar la información del equipo?');

            // Si el usuario hace clic en "Aceptar", se enviará el formulario
            if (confirmacion) {
                document.getElementById('actualizarEquipo').submit();
            }

        });
        </script>

    </form>
</div>

@stop