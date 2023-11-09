@extends('layout/template')

@section('title', 'Inicio Asesor')

@section('opciones')
    
        
<li class="nav-item dropdown">
            <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Asesores
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="{{ url('asesores/create') }}">Registrar asesor</a></li>
                <li><a class="dropdown-item" href="#">Lista de asesores</a></li>

            </ul>
</li>

<li class="nav-item dropdown">
            <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Ventas
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="{{ url('ventas/create') }}">Ventas de hoy</a></li>

            </ul>
</li>


   
        
    
@stop

@section('contenido')

<div class="d-flex justify-content-center">
    <h1>Bienvenido(a): {{ auth()->user()->user }}</h1>
    
</div>  
<div class="d-flex justify-content-center">
<br>
    <h2>Supervisor</h2>
</div>
@stop
