@extends('inicios/analista')

@section('title', 'Ventas en espera de contrato')

@section('contenido')
<main>
    <div class="container py-4">

        <h2>Ventas en espera de contrato</h2>
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>ID venta</th>
                    <th>Linea</th>
                    <th>Nombre del cliente</th>
                    <th>Zona</th>
                    <th>Fecha de entrega</th>
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
                    <th>{{ $venta->zona->nombre_zona}}</th>
                    <th>{{ $venta->ruta->fecha_entrega}}</th>

                    <th><a href="{{  url('ventas/' .$venta->id. '/contrato ') }}"
                            class="btn btn-primary btn-small">Abrir</a></th>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</main>

@stop