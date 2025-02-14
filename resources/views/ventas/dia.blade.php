@extends((Auth::user()->puesto_empleado == 0) ? 'inicios.admin' :
((Auth::user()->puesto_empleado == 1) ? 'inicios.supervisor' : 'inicios.supervisor'))

@section('title', 'Ventas en curso')

@section('contenido')
<main>
    <div class=" row mx-0">

        <div >
            <h2>Ventas en curso</h2>
        </div>
        <div class="container col-7">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>ID venta</th>
                        <th>Linea</th>
                        <th>Nombre del cliente</th>
                        <th>Asesor</th>
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
                        <th>{{ $venta->asesor->user->user}}</th>
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
                        @elseif ($venta->estado_venta == 11)
                        <th>Comisionable</th>
                        @endif

                        <th><a href="{{  url('ventas/' .$venta->id. '/sshow') }}" class="btn btn-primary btn-small">Ver</a>
                        </th>



                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <div class="container col-5 px-0 mx-12" id="contador">
            <div style="text-align:center">
                <h1 class="strong mb-0" style="font-size:35vW">{{count($ventas)}}</h1>
            </div>
        </div>
    </div>
</main>

@stop