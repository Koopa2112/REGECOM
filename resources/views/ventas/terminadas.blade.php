@extends('inicios/asesor')

@section('title', 'Ventas terminadas')

@section('contenido')
<main>
<div class="container py-4">

<h2>Ventas terminadas</h2>
    <table class="table table-striped">

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
          
            <th>{{ $venta->id }}</th>
            <th>{{ $venta->linea_venta }}</th>
            <th>{{ $venta->nombre_cliente }}</th>

            @if ($venta->estado_venta == 9)
                <th>Finalizada</th>
            @elseif ($venta->estado_venta == 10)
                <th>Cancelada</th>
            @else
                <th></th>
            @endif

            <th><a href="#" class="btn btn-primary btn-small">Ver</a></th>



        </tr>
        @endforeach
    </tbody>

    </table>
</div>
</main>
                                         
@stop