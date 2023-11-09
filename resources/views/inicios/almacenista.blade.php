@extends('layout/template')

@section('title', 'Inicio Asesor')

@section('opciones')
    
        
<li class="nav-item dropdown">
            <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Ventas
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="{{ url('ventas/create') }}">Registrar venta</a></li>
                <li><a class="dropdown-item" href="#">Mis ventas en curso</a></li>
                <li><a class="dropdown-item" href="#">Mis ventas terminadas</a></li>
            </ul>
</li>


   
        
    
@stop

@section('contenido')

<div class="d-flex justify-content-center">
    <h1>Bienvenido(a): {{ auth()->user()->user }}</h1>
    
</div>  
<div class="d-flex justify-content-center">
<br>
    <h2>Almacen</h2>
</div>
@stop
