@extends('inicios/admin')

@section('title', 'Editar Usuario')

@section('contenido')




    <div class="container py-4">
        <h2>Editar usuario</h2>

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

    <form action="{{ url('users/'. $user->id) }}" method="post" id="registrarUsuario">
        @method("put")
        @csrf

        <div class="mb-3 row">
            <label for="nombre_completo" class="col-sm-2 col-form-label">Nombre completo</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="nombre_completo" id="nombre_completo" value="{{$user->nombre}}" required>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="user" class="col-sm-2 col-form-label">Nombre de usuario</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="user" id="user" value="{{$user->user}}" required>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" name="password" id="password" value="" required>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="puesto_empleado" class="col-sm-2 col-form-label">Puesto</label>
            <div class="col-sm-5">
                <select name="puesto_empleado" class="form-select" id="puesto_empleado" nvalue= ""required >
                    <option disabled selected>Seleccionar...</option>
                    <option value="0" @if($user->puesto_empleado == 0) selected @endif>Administrador</option>
                    <option value="1" @if($user->puesto_empleado == 1) selected @endif>Supervisor</option>
                    <option value="2" @if($user->puesto_empleado == 2) selected @endif>Calidad</option>
                    <option value="3" @if($user->puesto_empleado == 3) selected @endif>Asesor</option>
                    <option value="4" @if($user->puesto_empleado == 4) selected @endif>Logistica</option>
                    <option value="5" @if($user->puesto_empleado == 5) selected @endif>Almacen</option>
                    <option value="6" @if($user->puesto_empleado == 6) selected @endif>Analista</option>
                </select>
            
            </div>
        </div>

        <div class="mb-3 row">
            <label for="estado" class="col-sm-2 col-form-label">Permitir acceso</label>
            <div class="col-sm-5">

                @if($user->estado == true)
                <input type="checkbox" class="form-check-input" name="estado" id="estado"
                    value="{{ $user->estado}}" checked>
                @else
                <input type="checkbox" class="form-check-input" name="estado" id="estado"
                    value="{{ $user->estado}}">
                @endif

            </div>
        </div>

        <a href= "{{ url('inicio') }}" class="btn btn-secondary">Regresar</a>
        <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>

        <script>
        document.getElementById('btnGuardar').addEventListener('click', function() {
            // Muestra un cuadro de diálogo de confirmación
            var confirmacion = confirm('¿Estás seguro de que deseas registrar el usuario?');

            // Si el usuario hace clic en "Aceptar", se enviará el formulario
            if (confirmacion) {
                document.getElementById('registrarUsuario').submit();
            }
            
        });
        </script>
    </form>

        
    </div>

@stop