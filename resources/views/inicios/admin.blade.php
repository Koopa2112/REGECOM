@extends('layout/template')

@section('title', 'Inicio Administrador')

@section('opciones')
    
        
<li class="nav-item dropdown">
            <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Usuarios
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="{{ url('users/create') }}">Registrar usuario</a></li>
                <li><a class="dropdown-item" href="{{ url('users/index') }}">Ver usuarios</a></li>

            </ul>
</li>


   
        
    
@stop

@section('contenido')

<div class="d-flex justify-content-center">
    <h1>Bienvenido(a): {{ auth()->user()->user }}</h1>
    
</div>  
<div class="d-flex justify-content-center">
<br>
    <h2>Administrador</h2>
</div>
@stop
