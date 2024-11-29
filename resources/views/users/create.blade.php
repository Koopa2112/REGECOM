@extends('inicios/admin')

@section('title', 'Registrar Usuario')

@section('contenido')




    <div class="container py-4">
        <h2>Registrar usuario</h2>

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

    <form action="{{ url('users') }}" method="post" id="registrarUsuario">

        @csrf

        <div class="mb-3 row">
            <label for="nombre_completo" class="col-sm-2 col-form-label">Nombre completo</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="nombre_completo" id="nombre_completo" value="{{old ('nombre_completo')}}" required>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="user" class="col-sm-2 col-form-label">Nombre de usuario</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="user" id="user" value="{{old ('user')}}" required>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" name="password" id="password" value="{{old ('password')}}" required>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="puesto_empleado" class="col-sm-2 col-form-label">Puesto</label>
            <div class="col-sm-5">
                <select name="puesto_empleado" class="form-select" id="puesto_empleado" value= "" required>
                    <option disabled selected>Seleccionar...</option>
                    <option value="0">Administrador</option>
                    <option value="1">Supervisor</option>
                    <option value="2">Calidad</option>
                    <option value="3">Asesor</option>
                    <option value="4">Logistica</option>
                    <option value="5">Almacen</option>
                    <option value="6">Analista</option>
                    <option value="7">Repartidor</option>
                </select>
            
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