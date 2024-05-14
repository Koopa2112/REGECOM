@extends('inicios/logistica')

@section('title', 'Zonas')

@section('contenido')
<main>
    <div class="container py-4">

        <h2>Zonas</h2>
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>ID Zona</th>
                    <th>Nombre zona</th>

                    <th></th>
                </tr>
            </thead>

            <br>
            <tbody>
                @foreach($zonas as $zona)
                <tr>

                    <th>{{ $zona->id}}</th>
                    <th>{{ $zona->nombre_zona }}</th>

                    <th><a href="{{  url('zonas/' .$zona->id. '/edit') }}" class="btn btn-primary btn-small">Editar ruta</a></th>
                    <th><button onclick="confirmacionBorrado('{{$zona->id }}')" class="btn btn-danger btn-small">Eliminar zona</button></th>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</main>

<script>
    function confirmacionBorrado(id) {
        var respuesta = confirm("¿Está seguro de eliminar esta zona? Ya no podrás deshacer esta acción");
        if (respuesta == true) {
            // Crear un formulario dinámicamente
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ url("zonas") }}/' + id + '/delete';

            // Agregar campo de token CSRF
            var token = document.createElement('input');
            token.type = 'hidden';
            token.name = '_token';
            token.value = '{{ csrf_token() }}';
            form.appendChild(token);

            // Agregar formulario al cuerpo del documento
            document.body.appendChild(form);

            // Enviar el formulario
            form.submit();
        }
    }
</script>
@stop