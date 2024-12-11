@extends((Auth::user()->puesto_empleado == 6) ? 'inicios.logistica' : 
        ((Auth::user()->puesto_empleado == 7) ? 'inicios.repartidor' : 'inicios.repartidor'))

@section('title', 'Ventas en ruta')

@section('contenido')
<main>
    <div class="container-lg" >

        <h2>Ventas en ruta</h2>
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
        <div style="overflow-x:auto;">
        <table class="table table-striped table-responsive">

            <thead>
                <tr>
                    <th style="font-size: 0.75rem;">ID venta</th>
                    <th style="font-size: 0.75rem;">Fecha de envio</th>
                    <th style="font-size: 0.75rem;">Linea</th>
                    <th style="font-size: 0.75rem;">Nombre del cliente</th>
                    <th style="font-size: 0.75rem;">Domicilio</th>
                    @if(Auth::user()->puesto_empleado!=7)
                        <th style="font-size: 0.75rem;">Notas</th>
                    @endif
                    <th style="font-size: 0.75rem;">Asesor</th>
                    <th></th>
                    <!--<th></th>-->
                </tr>
            </thead>

            <br>

            <tbody>
                @foreach($ventas as $venta)
                <tr>

                    <td style="font-size: 0.75rem;">{{ $venta->id}}</td>
                    <td style="font-size: 0.75rem;">{{ $venta->fecha_entrega }}</td>
                    <td style="font-size: 0.75rem;">{{ $venta->linea_venta }}</td>
                    <td style="font-size: 0.75rem;">{{ $venta->nombre_cliente }}</td>
                    <td style="font-size: 0.75rem;">{{ $venta->calle_entrega}},#{{ $venta->numero_entrega}}. {{ $venta->colonia_entrega}},
                    {{ $venta->municipio_entrega}}. {{ $venta->referencia_entrega}}
                    </td>
                    @if(Auth::user()->puesto_empleado!=7)
                        <td style="font-size: 0.75rem;">{{ $venta->notas_vendedor}}///{{ $venta->notas_MC}}</td>
                    @endif
                    <td style="font-size: 0.75rem;">{{ $venta->asesor->user->user}}</td>
                    <td style="font-size: 0.75rem;"><a href="{{  url('ventas/' .$venta->id. '/lshow') }}" class="btn btn-primary btn-small">Ver</a></td>
                    <!--<form action="{{url('ventas/' . $venta->id .'/envio')}}" id="envio{{ $venta->id }}" method="post">
                        @csrf
                        <input type="hidden" value="" id="estado_venta{{ $venta->id }}" name="estado_venta">
                        <input type="hidden" value="" id="comentario{{ $venta->id }}" name="comentario">
                        <td><div class="btn-group-vertical">
                            <button type="button" class="btn btn-success btn-sm" onclick="actualizar(8, '{{ $venta->id }}')">Entregada</button>
                            
                            <button type="button" class="btn btn-warning btn-sm" onclick="actualizar(4, '{{ $venta->id }}')">No entregada</button>
                        </div></td>
                </tr>
                </form>-->
                @endforeach
            </tbody>

        </table></div>
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