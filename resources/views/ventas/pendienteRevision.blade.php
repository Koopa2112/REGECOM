@extends('inicios/calidad')

@section('title', 'Revisión de linea')

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
                    <th>Asesor</th>
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
                    <th>{{ $venta->asesor->user->user}}</th>

                    <th><a href="{{  url('ventas/' .$venta->id. '/cshow') }}"
                            class="btn btn-primary btn-small">Abrir</a></th>



                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</main>

@stop