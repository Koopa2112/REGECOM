@extends((Auth::user()->puesto_empleado == 4) ? 'inicios.logistica' : 
        ((Auth::user()->puesto_empleado == 1) ? 'inicios.supervisor' : 'inicios.logistica'))
@section('title', 'Ventas para asignar zona')

@section('contenido')
<main>
    <div class="container py-4">

        <h2>Ventas para asignar zona</h2>
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>ID venta</th>
                    <th>Linea</th>
                    <th>Nombre del cliente</th>
                    <th></th>
                </tr>
            </thead>

            <br>
            <tbody>
                @foreach($ventas as $venta)
                <tr>

                    <th>{{ $venta->id}}</th>
                    <th>{{ $venta->linea_venta }}</th>
                    <th>{{ $venta->nombre_cliente }}</th>
                    <th>{{ $venta->asesor->user->user}}</th>

                    <th><a href="{{  url('ventas/' .$venta->id. '/asignarZona') }}"
                            class="btn btn-primary btn-small">Asignar zona</a></th>

                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</main>

@stop