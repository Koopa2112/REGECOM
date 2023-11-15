@extends('layout/template')

@section('title', 'Registrar Venta')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>{{$msg}}</h2>
        <a href="{{ url('inicio') }}" class="btn btn-secondary">Regresar</a>
    </div>
</main>

@stop