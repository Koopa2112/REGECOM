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
                    <th>Agregar a zona</th>
                </tr>
            </thead>

            <br>
            <tbody>
                @foreach($ventas as $venta)
                <tr>

                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->linea_venta }}</td>
                    <td>{{ $venta->nombre_cliente }}</td>
                    @if ($venta->estado_venta == 0)
                    <td>Creada</td>
                    @elseif ($venta->estado_venta == 1)
                    <td>Rechazada</td>
                    @elseif ($venta->estado_venta == 2)
                    <td>Aceptada</td>
                    @elseif ($venta->estado_venta == 3)
                    <td>Problema</td>
                    @elseif ($venta->estado_venta == 4)
                    <td>Esperando fecha de entrega</td>
                    @elseif ($venta->estado_venta == 5)
                    <td>Esperando asignación de zona</td>
                    @elseif ($venta->estado_venta == 6)
                    <td>Esperando contrato</td>
                    @elseif ($venta->estado_venta == 7)
                    <td>En fase de entrega</td>
                    @elseif ($venta->estado_venta == 8)
                    <td>Trámite en proceso</td>
                    @elseif ($venta->estado_venta == 9)
                    <td>Finalizada</td>
                    @elseif ($venta->estado_venta == 10)
                    <td>Cancelada</td>
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