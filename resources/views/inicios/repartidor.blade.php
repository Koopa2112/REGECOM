@extends('layout/template')

@section('title', 'Inicio Repartidor')

@section('opciones')


<li class="nav-item dropdown">
    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Lineas
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="{{ url('ventas/enviadas') }}">Ventas enviadas</a></li>
        <li><a class="dropdown-item" href="{{ url('ventas/pendienteZona') }}">Ventas para asignar zona</a></li>

    </ul>
</li>

<!--<li class="nav-item dropdown">
    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Rutas
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="{{ url('rutas') }}">Ver rutas</a></li>

    </ul>
</li>-->


@stop

@section('contenido')

<div class="d-flex justify-content-center">
    <h1>Bienvenido(a): {{ auth()->user()->nombre }}</h1>

</div>
<div class="d-flex justify-content-center">
    <br>
    <h2>Repartidor</h2>
</div>
@stop