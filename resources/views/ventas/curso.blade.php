@extends('inicios/asesor')

@section('title', 'Ventas en curso')

@section('contenido')
<main>
    <div class="container py-4">

        <h2>Ventas en curso</h2>
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>ID venta</th>
                    <th>Linea</th>
                    <th>Nombre del cliente</th>
                    <th>Estado</th>
                    <th>Info</th>
                    <th></th>
                </tr>
            </thead>

            <br>
            <tbody>
                @foreach($ventas as $venta)
                <tr>

                    <th>{{ $venta->id }}</th>
                    <th>{{ $venta->linea_venta }}</th>
                    <th>{{ $venta->nombre_cliente }}</th>
                    @if ($venta->estado_venta == 0)
                    <th>Creada</th>
                    @elseif ($venta->estado_venta == 1)
                    <th>Rechazada</th>
                    @elseif ($venta->estado_venta == 2)
                    <th>Aceptada</th>
                    @elseif ($venta->estado_venta == 3)
                    <th>Aceptada</th>
                    @elseif ($venta->estado_venta == 4)
                    <th>Problema</th>
                    @elseif ($venta->estado_venta == 5)
                    <th>Esperando fecha de entrega</th>
                    @elseif ($venta->estado_venta == 6)
                    <th>Esperando contrato</th>
                    @elseif ($venta->estado_venta == 7)
                    <th>En fase de entrega</th>
                    @elseif ($venta->estado_venta == 8)
                    <th>Entregada</th>
                    @elseif ($venta->estado_venta == 9)
                    <th>Finalizada</th>
                    @elseif ($venta->estado_venta == 10)
                    <th>Cancelada</th>
                    @endif

                    <th><a href="{{  url('ventas/' .$venta->id. '/show') }}" class="btn btn-primary btn-small">Ver</a>
                    </th>
                    @if ($venta->estado_venta == 5)
                    <th><a href="{{  url('ventas/' .$venta->id. '/fecha') }}"
                            class="btn btn-secondary btn-small">Agregar fecha</a></th>
                    @else
                    <th></th>
                    @endif


                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</main>

@stop