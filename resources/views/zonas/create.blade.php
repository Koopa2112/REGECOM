@extends('inicios/logistica')

@section('title', 'Editar ruta')

@section('contenido')




<div class="container py-4">
    <h2>Crear zona</h2>

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

    <form action="{{ url('zonas/' ) }}" method="post" id="crearZona">
       
        @csrf

        <div class="mb-3 row">
            <label for="nombre_zona" class="col-sm-2 col-form-label">Nombre de la zona</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="nombre_zona" id="nombre_zona" required>
            </div>
        </div>



        <a href="{{ url('zonas') }}" class="btn btn-secondary">Regresar</a>
        <button type="button" class="btn btn-primary" id="btnGuardar" onclick="update()">Guardar</button>

        <script>
        function update(){
            // Muestra un cuadro de diálogo de confirmación
            var confirmacion = confirm('¿Estás seguro de que deseas actualizar la información de la ruta?');

            // Si el usuario hace clic en "Aceptar", se enviará el formulario
            if (confirmacion) {
                document.getElementById('crearZona').submit();
            }

        };
        </script>

    </form>


</div>

@stop