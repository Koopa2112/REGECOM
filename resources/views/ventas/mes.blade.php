@extends((Auth::user()->puesto_empleado == 0) ? 'inicios.admin' : 
        ((Auth::user()->puesto_empleado == 1) ? 'inicios.supervisor' : 'inicios.supervisor'))

@section('title', 'Ventas ultimos 30 dias')

@section('contenido')
<main>
    <div class="container py-4">

        <h2>Ventas ultimos 30 dias</h2>
        <table class="table table table-striped" data-filter-control="true" >

        <h5>Presiona CTRL+F para realizar una búsqueda</h5>

            <tdead>
                <tr>
                    <th>ID venta</th>
                    <th>Linea</th>
                    <th>Zona</th>
                    <th>Nombre del cliente</th>
                    <th>Asesor</th>
                    <th>Estado</th>
                    <th>Fecha venta</th>
                    <th>Info</th>
                </tr>
            </tdead>

            <br>
            <tbody>
                @foreach($ventas as $venta)
                <tr>

                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->linea_venta }}</td>
                    @if ($venta->zona == null)
                    <td >Sin zona asignada</td>
                    @else
                    <td>{{ $venta->zona->nombre_zona }}</td>
                    @endif
                    <td>{{ $venta->nombre_cliente }}</td>
                    <td>{{ $venta->asesor->user->user}}</td>
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
                    @elseif ($venta->estado_venta == 11)
                    <td>Comisionable</td>
                    @endif
                    <td>{{ $venta->fecha_venta}}</td>
                    <td><a href="{{  url('ventas/' .$venta->id. '/sshow') }}" class="btn btn-primary btn-small">Ver</a>
                    </td>



                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</main>

@stop