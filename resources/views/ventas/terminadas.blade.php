@extends('inicios/asesor')

@section('title', 'Ventas terminadas')

@section('contenido')
<main>
    <div class="container py-4">

        <h2>Ventas terminadas</h2>
        <table class="table table-striped">
        <h5> <strong><ins>*Nota: el estado de "Comisionable" puede no aplicar en las ventas anteriores a agosto</ins></strong></h5>
            <thead>
                <tr>
                    <th>ID venta</th>
                    <th>Linea</th>
                    <th>Nombre del cliente</th>
                    <th>Estado</th>
                    <th>Info</th>
                </tr>
            </thead>

            <br>
            <tbody>
                @foreach($ventas as $venta)
                <tr>

                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->linea_venta }}</td>
                    <td>{{ $venta->nombre_cliente }}</td>

                    @if ($venta->estado_venta == 9)
                    <td>Finalizada</td>
                    @elseif ($venta->estado_venta == 10)
                    <td>Cancelada</td>
                    @elseif ($venta->estado_venta == 11)
                    <td>Comisionable en {{$venta->acuse->fecha_sellado}}*</td>
                    @else
                    <td>No hay información</td>
                    @endif

                    <th><a href="{{  url('ventas/' .$venta->id. '/show') }}" class="btn btn-primary btn-small">Ver</a>
                    </th>



                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</main>

@stop