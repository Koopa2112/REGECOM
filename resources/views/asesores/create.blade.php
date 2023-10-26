@extends('layout/template')

@section('title', 'Registrar asesor')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Registrar asesor</h2>

        @if ($errors->any())

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @endif

        <form action="{{ url('asesores') }}" method="post">

        @csrf

        <div class="mb-3 row">
            <label for="nombre_completo" class="col-sm-2 col-form-label">Nombre completo</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="nombre_completo" id="nombre_completo" value="{{old ('nombre_completo')}}" required>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="nombre_empleado" class="col-sm-2 col-form-label">Nombre de usuario</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="nombre_empleado" id="nombre_empleado" value="{{old ('nombre_empleado')}}" required>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" name="password" id="password" value="{{old ('password')}}" required>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="incubadora" class="col-sm-2 col-form-label">Incubadora</label>
            <div class="col-sm-5">
                <input type="checkbox" class="form-check-input" name="incubadora" id="incubadora" value="{{old ('incubadora')}}">

            </div>
        </div>

        <a href= "{{ url('asesores') }}" class="btn btn-secondary">Regresar</a>
        <button type="submit" class="btn btn-success">Guardar</button>

        </form>

        
    </div>
</main>
