@extends('inicios/almacen')

@section('title', 'Registrar equipo')

@section('contenido')




<div class="container py-4">
    <h2>Registrar equipo</h2>

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

    <form id="form" action="{{ url('equipos')}}" method="post">
        @csrf

        <div class="mb-3 row">
            <label for="marca" class="col-sm-2 col-form-label">Marca</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="marca" id="marca"
                    value="{{old ('marca')}}" required>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="modelo" class="col-sm-2 col-form-label">Modelo</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="modelo" id="modelo"
                    value="{{old ('modelo')}}" required>

            </div>
        </div>
        <input type="hidden" id="imeis" name="imeis">
    </form>
    <div class="mb-3 row">
    <label for="textoEntrada" class="col-sm-2 col-form-label">IMEI</label>
    <textarea id="textoEntrada"  class="form-control" rows="5" cols="40"></textarea>
    </div>
    <button class="btn btn-success" onclick="guardarLineas()">Guardar Líneas</button>

    <script>
    function guardarLineas() {
        var textarea = document.getElementById('textoEntrada');
        var contenido = textarea.value;

        // Dividir el contenido del textarea en líneas
        var lineas = contenido.split('\n');

        // Eliminar líneas en blanco del arreglo si es necesario
        var lineasNoVacias = lineas.filter(linea => linea.trim() !== '');

        // Mostrar las líneas en la consola (puedes almacenarlas en una variable o hacer otras operaciones)
        document.getElementById('imeis').value = lineasNoVacias;
        document.getElementById('form').submit();
    }
    </script>


</div>

@stop