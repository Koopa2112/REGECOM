@extends('inicios/logistica')

@section('title', 'Rutas')

@section('contenido')
<main>
    <div class="container py-4">

        <h2>Rutas</h2>
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>ID ruta</th>
                    <th>Dia</th>
                    <th>Zona</th>
                    <th>Max</th>
                    <th>Programadas</th>
                    <th></th>
                </tr>
            </thead>

            <br>
            <tbody>
                @foreach($rutas as $ruta)
                <tr>

                    <th>{{ $ruta->id}}</th>
                    <th>{{ $ruta->fecha_entrega }}</th>
                    <th>{{ $ruta->zona->nombre_zona }}</th>
                    <th>{{ $ruta->max_entregas}}</th>
                    <th>{{ $ruta->num_entregas}}</th>

                    <th><a href="{{  url('rutas/' .$ruta->id. '/edit') }}"
                            class="btn btn-primary btn-small">Editar ruta</a></th>

                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</main>

@stop