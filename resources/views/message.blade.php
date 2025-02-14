@extends('layout/template')

@section('title', 'Registrar Venta')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>{{$msg}}</h2>
        <a href="{{ url('inicio') }}" class="btn btn-secondary">Regresar</a>
    </div>
    <div style="text-align: center; ">
        <!--<img style="height: 400px" src="<?php //echo getRandomImage();?>"> -->
    </div>
    
</main>

<?php
//    function getRandomImage(){
//        $api = 'https://dog.ceo/api/breeds/image/random';
//        $responde = json_decode(file_get_contents($api));
//        if(isset($responde->status) && $responde->status == "success"){
//            return $responde->message;
//        }
//    }
?>
@stop