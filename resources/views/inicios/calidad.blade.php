@extends('layout/template')

@section('title', 'Inicio Calidad')

@section('opciones')


<li class="nav-item dropdown">
    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Ventas
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="{{ url( '/ventas/pendienteRevision') }}">Ventas pendientes de revisión</a>
        </li>

    </ul>
</li>





@stop

@section('contenido')

<div class="d-flex justify-content-center">
    <h1>Bienvenido(a): {{ auth()->user()->nombre }}</h1>

</div>
<div class="d-flex justify-content-center">
    <br>
    <h2>Calidad</h2>
</div>
@stop