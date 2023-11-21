@extends('inicios/Almacen')

@section('title', 'Equipos asignados')

@section('contenido')
<main>
    <div class="container py-4">

        <h2>Equipos asignados</h2>
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>ID equipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Imei</th>
                    <th>Linea asignada</th>

                </tr>
            </thead>

            <br>
            <tbody>
                @foreach($equipos as $equipo)
                <tr>

                    <th>{{ $equipo->id }}</th>
                    <th>{{ $equipo->marca_equipo }}</th>
                    <th>{{ $equipo->modelo_equipo }}</th>
                    <th>{{ $equipo->imei }}</th>
                    <th>@foreach($lineas as $linea)
                        @if($linea->id_equipo == $equipo->id)
                        {{ $linea->linea_venta}}
                        @endif
                        @endforeach
                    </th>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</main>

@stop