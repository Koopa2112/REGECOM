@extends('layout/template')

@section('title', 'Inicio Analista')

@section('opciones')


<li class="nav-item dropdown">
    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Lineas
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="{{ url('ventas/pendienteAnalisis') }}">Lineas para analizar</a></li>
    </ul>
</li>

<li class="nav-item dropdown">
    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Contratos
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="{{ url('ventas/conRuta') }} ">Contratos con ruta asignada</a></li>
        <li><a class="dropdown-item" href="{{ url('ventas/entregadas') }} ">Contratos entregados</a></li>
    </ul>
</li>





@stop

@section('contenido')

<div class="d-flex justify-content-center">
    <h1>Bienvenido(a): {{ auth()->user()->nombre }}</h1>

</div>
<div class="d-flex justify-content-center">
    <br>
    <h2>Analista</h2>
</div>
@stop