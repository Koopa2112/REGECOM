@extends('inicios/almacen')

@section('title', 'Equipos en inventario')

@section('contenido')
<main>
    <div class="container py-4">

        <h2>Equipos en inventario</h2>
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>ID equipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Imei</th>
                    <th></th>

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
                    <th><a href="{{  url('equipos/' .$equipo->id. '/edit') }}"
                            class="btn btn-primary btn-small">Editar equipo</a></th>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</main>

@stop