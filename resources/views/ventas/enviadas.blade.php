@extends('inicios/logistica')

@section('title', 'Ventas enviadas')

@section('contenido')
<main>
    <div class="container py-4">

        <h2>Ventas enviadas</h2>
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
        <table class="table table-striped table-responsive">

            <thead>
                <tr>
                    <th>ID venta</th>
                    <th>Fecha de envio</th>
                    <th>Linea</th>
                    <th>Nombre del cliente</th>
                    <th>Domicilio</th>
                    <th>Notas</th>
                    <th>URL</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <br>

            <tbody>
                @foreach($ventas as $venta)
                <tr>

                    <td>{{ $venta->id}}</td>
                    <td>{{ $venta->ruta->fecha_entrega }}</td>
                    <td>{{ $venta->linea_venta }}</td>
                    <td>{{ $venta->nombre_cliente }}</td>
                    <td>{{ $venta->calle_entrega}},#{{ $venta->numero_entrega}}. {{ $venta->colonia_entrega}},
                    {{ $venta->municipio_entrega}}. {{ $venta->referencia_entrega}}
                    </td>
                    <td>{{ $venta->notas_vendedor}}///{{ $venta->notas_MC}}</td>
                    <td>{{ $venta->url_maps}}</td>
                    <td><a href="{{  url('ventas/' .$venta->id. '/lshow') }}" class="btn btn-primary btn-small">Ver</a></td>
                    <form action="{{url('ventas/' . $venta->id .'/envio')}}" id="envio{{ $venta->id }}" method="post">
                        @csrf
                        <input type="hidden" value="" id="estado_venta{{ $venta->id }}" name="estado_venta">
                        <input type="hidden" value="" id="comentario{{ $venta->id }}" name="comentario">
                        <td><button type="button" class="btn btn-success btn-small" onclick="actualizar(8, '{{ $venta->id }}')">Entregada</button>
                        </td>
                        <td><button type="button" class="btn btn-warning btn-small" onclick="actualizar(4, '{{ $venta->id }}')">No
                                entregada</button></td>
                </tr>
                </form>
                @endforeach

            </tbody>

        </table>
        <script>
            function actualizar(estado, id) {
                var estadoHidden = document.getElementById('estado_venta' + id);
                var comentario = document.getElementById('comentario' + id);
                if (estado == '8') {
                    var confirmacion = confirm("La venta se marcará como entregada, ¿Proseguir?");
                } else if (estado == '4') {
                    var confirmacion = confirm("La venta se marcará como NO entragada, ¿Proseguir?");
                    if (confirmacion) {
                        comentario.value = prompt('Porfavor, introduce el motivo:');
                    }
                }
                var formulario = document.getElementById('envio' + id);
                if (confirmacion) {
                    estadoHidden.value = estado;
                    formulario.submit();
                }

            }
        </script>

    </div>
</main>

@stop