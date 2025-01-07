@extends('layout/template')

@section('title', 'Inicio Administrador')

@section('opciones')


<li class="nav-item dropdown">
    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Usuarios
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="{{ url('users/create') }}">Registrar usuario</a></li>
        <li><a class="dropdown-item" href="{{ url('users') }}">Ver usuarios</a></li>

    </ul>
</li>

<li class="nav-item dropdown">
    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Acuses
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="{{ url('acuses') }}">Ver Acuses</a></li>
        <li><a class="dropdown-item" href="{{ url('acuses/comisiones') }}">Imprimir comisiones</a></li>
    </ul>
</li>

<li class="nav-item dropdown">
    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Ventas
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="{{ url('ventas/dia') }}">Ventas de hoy</a></li>
        <li><a class="dropdown-item" href="{{ url('ventas/mes') }}">Ventas ultimos 30 dias</a></li>
        <li><a class="dropdown-item" href="{{ url('ventas/pendienteAnalisis') }}">Lineas para analizar</a></li>
        <li><a class="dropdown-item" href="{{ url('ventas/conRuta') }} ">Contratos con ruta asignada</a></li>
        <li><a class="dropdown-item" href="{{ url('ventas/entregadas') }} ">Contratos entregados</a></li>
        <li><a class="dropdown-item" href="{{ url('ventas/pendienteZona') }}">Ventas para asignar zona</a></li>
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

<li class="">
    <form action="{{ url('ventas/busqueda') }}" method="POST">
        @csrf
        <div class="input-group input-group-sm">
            <input type="text" class="form-control input-sm" placeholder="Línea, ID o nombre" aria-label="Cuadro de búsqueda" aria-describedby="inputGroup-sizing-sm" id="busqueda" name="busqueda">
            <div class="input-group-prepend">
                <button type="submit" class="input-group-text" id="botonBusqueda">Búsqueda</button>
            </div>

        </div>
    </form>
</li>




@stop

@section('contenido')

<div class="d-flex justify-content-center">
    <h1>Bienvenido(a): {{ auth()->user()->nombre }}</h1>

</div>
<div class="d-flex justify-content-center">
    <br>
    <h2>Administrador</h2>
</div>
@stop