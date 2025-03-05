@extends('inicios/asesor')

@section('title', 'Ventas en curso')

@section('contenido')

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
                    <th>Problema</th>
                    @elseif ($venta->estado_venta == 4)
                    <th>Esperando fecha de entrega</th>
                    @elseif ($venta->estado_venta == 5)
                    <th>Esperando asignación de zona</th>
                    @elseif ($venta->estado_venta == 6)
                    <th>Esperando contrato</th>
                    @elseif ($venta->estado_venta == 7)
                    <th>En fase de entrega</th>
                    @elseif ($venta->estado_venta == 8)
                    <th>Trámite en proceso</th>
                    @elseif ($venta->estado_venta == 9)
                    <th>Finalizada</th>
                    @elseif ($venta->estado_venta == 10)
                    <th>Cancelada</th>
                    @endif

                    <th><a href="{{  url('ventas/' .$venta->id. '/show') }}" class="btn btn-primary btn-small">Ver</a>
                    </th>
                    @if($venta->estado_venta == 0 || $venta->estado_venta == 2 || $venta->estado_venta == 3 || $venta->estado_venta == 4 || $venta->estado_venta == 5)
                        <th><a href="{{  url('ventas/' .$venta->id. '/edit') }}" class="btn btn-warning btn-small">Editar</a>
                        </th>
                    @endif
                    @if ($venta->estado_venta == 4)
                    <th><a href="{{  url('ventas/' .$venta->id. '/fecha') }}"
                            class="btn btn-secondary btn-small">{{$venta->zona->nombre_zona}}</a></th>
                    @elseif ($venta->estado_venta == 3 || $venta->estado_venta == 1)
                    <th><a href="{{  url('ventas/' .$venta->id. '/reenviar') }}"
                            class="btn btn-secondary btn-small">Reenviar venta</a></th>
                    @else
                    <th></th>
                    @endif


                </tr>
                @endforeach
            </tbody>

        </table>
    </div>


@stop