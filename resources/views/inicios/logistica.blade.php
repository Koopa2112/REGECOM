@extends('layout/template')

@section('title', 'Inicio Logística')

@section('opciones')


<li class="nav-item dropdown">
    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Lineas
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="{{ url('ventas/pendienteZona') }}">Ventas para asignar zona</a></li>
        <li><a class="dropdown-item" href="{{ url('ventas/enviadas') }}">Ventas enviadas</a></li>
    </ul>
</li>

<li class="nav-item dropdown">
    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Rutas
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="{{ url('rutas/create') }}">Agregar ruta</a></li>
        <li><a class="dropdown-item" href="{{ url('rutas') }}">Ver rutas</a></li>

    </ul>
</li>

<li class="nav-item dropdown">
    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Zonas
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="{{ url('zonas/create') }}">Agregar zona</a></li>
        <li><a class="dropdown-item" href="{{ url('zonas/') }}">Ver zonas</a></li>

    </ul>
</li>

<li class="nav-item dropdown">
    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Inventario
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="{{ url('equiposL/create') }}">Agregar equipos</a></li>
        <li><a class="dropdown-item" href="{{ url('equiposL/asignados') }}">Ver equipos asignados</a></li>
        <li><a class="dropdown-item" href="{{ url('equiposL/inventario') }}">Inventario</a></li>
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