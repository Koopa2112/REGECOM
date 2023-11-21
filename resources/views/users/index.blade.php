@extends('inicios/admin')

@section('title', 'Usuarios')

@section('contenido')
<main>
    <div class="container py-4">

        <h2>Usuarios</h2>
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>ID user</th>
                    <th>Nombre de usuario</th>
                    <th>Puesto empleado</th>
                    <th></th>

                </tr>
            </thead>

            <br>
            <tbody>
                @foreach($users as $user)
                <tr>

                    <th>{{ $user->id }}</th>
                    <th>{{ $user->user }}</th>
                    <th>@if($user->puesto_empleado == 0)
                        Administrador
                        @elseif( $user->puesto_empleado == 1)
                        Supervisor
                        @elseif( $user->puesto_empleado == 2)
                        Calidad
                        @elseif( $user->puesto_empleado == 3)
                        Asesor
                        @elseif( $user->puesto_empleado == 4)
                        Logística
                        @elseif( $user->puesto_empleado == 5)
                        Almacén
                        @elseif( $user->puesto_empleado == 6)
                        Analista
                        @endif
                    </th>

                    <th><a href="{{  url('users/' .$user->id. '/edit') }}"
                            class="btn btn-primary btn-small">Editar usuario</a></th>

                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</main>

@stop