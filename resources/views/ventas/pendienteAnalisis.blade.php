@extends((Auth::user()->puesto_empleado == 0) ? 'inicios.admin' : 
        ((Auth::user()->puesto_empleado == 4) ? 'inicios.logistica' : 
        ((Auth::user()->puesto_empleado == 6) ? 'inicios.repartidor' : 'inicios.repartidor')))

@section('title', 'Lineas para analizar')

@section('contenido')
<main>
    <div class="container py-4">

        <h2>Lineas para analizar</h2>
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>ID venta</th>
                    <th>Linea</th>
                    <th>Nombre del cliente</th>
                    <th>Asesor</th>
                    <th>Municipio</th>
                    <th></th>
                </tr>
            </thead>

            <br>
            <tbody>
                @foreach($ventas as $venta)
                <tr>

                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->linea_venta }}</td>
                    <td>{{ $venta->nombre_cliente }}</td>
                    <td>{{ $venta->asesor->user->user}}</td>
                    @if($venta->id_zona == null)
                    <td>{{ $venta->municipio_entrega}}</td>
                    @else
                    <td>{{ $venta->zona->nombre_zona}}</td>
                    @endif

                    <td><a href="{{  url('ventas/' .$venta->id. '/ashow') }}"
                            class="btn btn-primary btn-small">Abrir</a></td>



                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</main>

@stop