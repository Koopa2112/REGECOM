@extends('inicios/supervisor')

@section('title', 'Editar asesor')

@section('contenido')




<div class="container py-4">
    <h2>Editar asesor</h2>

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

    <form action="{{ url('asesores/' .$asesor->user->id ) }}" method="post" id="actualizarUsuario">
        @method("PUT")
        @csrf

        <div class="mb-3 row">
            <label for="nombre_completo" class="col-sm-2 col-form-label">Nombre completo</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="nombre_completo" id="nombre_completo"
                    value="{{ $asesor->user->nombre}}" required>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Nombre de usuario</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="user" id="user" value="{{ $asesor->user->user }}"
                    required>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" name="password" id="password">

            </div>
        </div>

        <div class="mb-3 row">
            <label for="incubadora" class="col-sm-2 col-form-label">Incubadora</label>
            <div class="col-sm-5">
                @if($asesor->incubadora == true)
                <input type="checkbox" class="form-check-input" name="incubadora" id="incubadora"
                    value="{{ $asesor->incubadora}}" checked>
                @else
                <input type="checkbox" class="form-check-input" name="incubadora" id="incubadora"
                    value="{{ $asesor->incubadora}}">
                @endif
            </div>
        </div>

        <div class="mb-3 row">
            <label for="estado" class="col-sm-2 col-form-label">Permitir acceso</label>
            <div class="col-sm-5">

                @if($asesor->user->estado == true)
                <input type="checkbox" class="form-check-input" name="estado" id="estado"
                    value="{{ $asesor->incubadora}}" checked>
                @else
                <input type="checkbox" class="form-check-input" name="estado" id="estado"
                    value="{{ $asesor->incubadora}}">
                @endif

            </div>
        </div>

        <a href="{{ url('asesores/lista') }}" class="btn btn-secondary">Regresar</a>
        <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>

        <script>
        document.getElementById('btnGuardar').addEventListener('click', function() {
            // Muestra un cuadro de diálogo de confirmación
            var confirmacion = confirm('¿Estás seguro de que deseas actualizar la información de usuario?');

            // Si el usuario hace clic en "Aceptar", se enviará el formulario
            if (confirmacion) {
                document.getElementById('actualizarUsuario').submit();
            }

        });
        </script>

    </form>


</div>

@stop