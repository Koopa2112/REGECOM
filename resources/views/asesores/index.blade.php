@extends('layout/template')

@section('title', 'Asesores')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Listado de asesores</h2>

        

        <a href="{{url('asesores/create')}}" class="btn btn-primary btn-sm">Nuevo Asesor</a>
    </div>
</main>
