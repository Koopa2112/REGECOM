@extends('inicios/logistica')

@section('title', 'Zonas')

@section('contenido')
<main>
    <div class="container py-4">

        <h2>Zonas</h2>
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>ID Zona</th>
                    <th>Nombre zona</th>

                    <th></th>
                </tr>
            </thead>

            <br>
            <tbody>
                @foreach($zonas as $zona)
                <tr>

                    <th>{{ $zona->id}}</th>
                    <th>{{ $zona->nombre_zona }}</th>

                    <th><a href="{{  url('zonas/' .$zona->id. '/edit') }}"
                            class="btn btn-primary btn-small">Editar ruta</a></th>

                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</main>

@stop