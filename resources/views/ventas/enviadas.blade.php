@extends('inicios/logistica')

@section('title', 'Ventas enviadas')

@section('contenido')
<main>
    <div class="container py-4">

        <h2>Ventas enviadas</h2>
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>ID venta</th>
                    <th>Linea</th>
                    <th>Nombre del cliente</th>
                    <th>Fecha de envio</th>
                    <th>Zona</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <br>

            <tbody>
                @foreach($ventas as $venta)
                <tr>

                    <th>{{ $venta->id}}</th>
                    <th>{{ $venta->linea_venta }}</th>
                    <th>{{ $venta->nombre_cliente }}</th>
                    <th>{{ $venta->ruta->fecha_entrega }}</th>
                    <th>{{ $venta->ruta->zona->nombre_zona }}</th>
                    <th><a href="{{  url('ventas/' .$venta->id. '/lshow') }}" class="btn btn-primary btn-small">Ver</a></th>
                    <form action="{{url('ventas/' . $venta->id .'/envio')}}" id="envio{{ $venta->id }}" method="post">
                        @csrf
                        <input type="hidden" value="" id="estado_venta{{ $venta->id }}" name="estado_venta">
                        <th><button type="button" class="btn btn-success btn-small" onclick="actualizar(8, '{{ $venta->id }}')">Entregada</button>
                        </th>
                        <th><button type="button" class="btn btn-warning btn-small" onclick="actualizar(4, '{{ $venta->id }}')">No
                                entregada</button></th>
                </tr>
                </form>
                @endforeach
                
            </tbody>

        </table>
        <script>
        function actualizar(estado, id) {
            var estadoHidden = document.getElementById('estado_venta'+id);
            estadoHidden.value = estado;
            if (estado == '8') {
                var confirmacion = confirm("La venta se marcará como entregada, ¿Proseguir?");
            }
            else if(estado == '4') {
                var confirmacion = confirm("La venta se marcará como NO entragada, ¿Proseguir?");
            }
            var formulario = document.getElementById('envio'+id);
            if (confirmacion) {
                formulario.submit();
            }

        }
        </script>

    </div>
</main>

@stop