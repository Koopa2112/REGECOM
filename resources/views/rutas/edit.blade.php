@extends('inicios/logistica')

@section('title', 'Editar ruta')

@section('contenido')




<div class="container py-4">
    <h2>Editar ruta</h2>

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

    <form action="{{ url('rutas/' .$ruta->id ) }}" method="post" id="actualizarRuta">
        @method("PUT")
        @csrf

        <div class="mb-3 row">
            <label for="max_entregas" class="col-sm-2 col-form-label">Maximo de entregas</label>
            <div class="col-sm-5">
                <input type="number" class="form-control" name="max_entregas" id="max_entregas"
                    value="{{ $ruta->max_entregas}}" required>

            </div>
        </div>


        <div class="mb-3 row">
            <label for="id_zona" class="col-sm-2 col-form-label">Zona</label>
            <div class="col-sm-5">
                <select class="form-select" id="id_zona" name="id_zona">
                    <option disabled selected>Seleccionar...</option>
                    @foreach($zonas as $zona)
                        <option value="{{ $zona->id}}" @if($zona->id == $ruta->id_zona) selected @endif>{{ $zona->nombre_zona }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="id_repartidor" class="col-sm-2 col-form-label">Repartidor</label>
            <div class="col-sm-5">
                <select class="form-select" id="id_repartidor" name="id_repartidor">
                    <option disabled selected>Seleccionar...</option>
                    @foreach($repartidores as $repartidor)
                        <option value="{{ $repartidor->id}}" @if($repartidor->id == $ruta->id_repartidor) selected @endif>{{ $repartidor->user }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="fecha_entrega" class="col-sm-2 col-form-label">Entregas programadas</label>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="fecha_entrega" id="fecha_entrega"
                    value="{{ $ruta->fecha_entrega}}" required>

            </div>
        </div>



        <a href="{{ url('rutas') }}" class="btn btn-secondary">Regresar</a>
        <button type="button" class="btn btn-primary" id="btnGuardar" onclick="update(0)">Guardar</button>

        <script>
        function update(id){
            // Muestra un cuadro de diálogo de confirmación
            var confirmacion = confirm('¿Estás seguro de que deseas actualizar la información de la ruta?');

            // Si el usuario hace clic en "Aceptar", se enviará el formulario
            if (confirmacion) {
                document.getElementById('actualizarRuta').submit();
            }

        };
        </script>

    </form>


</div>

@stop