@extends('inicios/supervisor')

@section('title', 'Lista de asesores')

@section('contenido')

<main>
    <div class="container py-4">

        <h2>Lista de asesores</h2>
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de usuario</th>
                    <th>Ventas de hoy</th>
                    <th></th>

                </tr>
            </thead>

            <br>
            <tbody>

                @foreach($asesores as $asesor)
                <tr>

                    <th>{{ $asesor->id_user }}</th>
                    <th>{{ $asesor->user->user }}</th>
                    @if(isset($conteo[$asesor->id]))
                    <th>{{ $conteo[$asesor->id] }}</th>
                    @else
                    <th></th>
                    @endif
                    <th><a href="{{  url('asesores/' .$asesor->id. '/edit') }}"
                            class="btn btn-primary btn-small">Ver</a></th>




                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</main>

@endsection