@extends('layout/template')

@section('title', 'Inicio Logística')

@section('opciones')


<li class="nav-item dropdown">
    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Lineas
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="#">Lineas para asignar zona</a></li>
    </ul>
</li>

<li class="nav-item dropdown">
    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Fechas de entrega
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="{{ url('ventas/create') }}">Agregar fecha de entrega</a></li>
        <li><a class="dropdown-item" href="#">Ver fechas de entrega</a></li>

    </ul>
</li>

<li class="nav-item dropdown">
    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Zonas
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="{{ url('ventas/create') }}">Agregar zona</a></li>
        <li><a class="dropdown-item" href="#">Ver zonas</a></li>

    </ul>
</li>





@stop

@section('contenido')

<div class="d-flex justify-content-center">
    <h1>Bienvenido(a): {{ auth()->user()->nombre }}</h1>

</div>
<div class="d-flex justify-content-center">
    <br>
    <h2>Logistica</h2>
</div>
@stop