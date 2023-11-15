@extends('layout/template')

@section('title', 'Inicio Almacenista')

@section('opciones')


<li class="nav-item dropdown">
    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Inventario
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="{{ url('ventas/create') }}">Agregar equipos</a></li>
        <li><a class="dropdown-item" href="#">Ver equipos asignados</a></li>
        <li><a class="dropdown-item" href="#">Inventario</a></li>
    </ul>
</li>





@stop

@section('contenido')

<div class="d-flex justify-content-center">
    <h1>Bienvenido(a): {{ auth()->user()->nombre }}</h1>

</div>
<div class="d-flex justify-content-center">
    <br>
    <h2>Almacen</h2>
</div>
@stop