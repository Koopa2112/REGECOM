@extends((Auth::user()->puesto_empleado == 4) ? 'inicios.logistica' : 
        ((Auth::user()->puesto_empleado == 0) ? 'inicios.admin' : 'inicios.logistica'))
        
@section('title', 'Ver acuse')

@section('contenido')

    <div class="container py-4">

        <h2>Acuse {{ $id }}</h2>

        <a href="{{  url('acuses/printAcuse/' .$id ) }}" class="btn btn-warning btn-small">Imprimir Hoja de acuse</a>

        <table class="table table-striped">

            <thead>
                <tr>
                    <th>ID venta</th>
                    <th>Linea</th>
                    <th>Nombre del cliente</th>
                    <th>Asesor</th>
                    <th>Info</th>
                    <th></th>
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
                    <td>{{ $venta->asesor->user->nombre }}</td>
                    <td><a href="{{  url('ventas/' .$venta->id. '/lshow') }}" class="btn btn-primary btn-small">Ver</a>
                    </td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>


@stop