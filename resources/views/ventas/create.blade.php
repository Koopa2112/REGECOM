@extends('inicios/asesor')

@section('title', 'Registrar Venta')

@section('contenido')

<main>
<div class="container py-4">
        <h2>Registrar venta</h2>

        @if ($errors->any())
        

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @endif

        <form action="{{ url('ventas') }}" method="post" id="registrarVenta">

        @csrf

        <div class="mb-3 row">
            <label for="linea_venta" class="col-sm-2 col-form-label">Linea del cliente</label>
            <div class="col-sm-5">
                <input type="tel" class="form-control" name="linea_venta" id="linea_venta" value="{{old ('linea_venta')}}" required>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="nombre_cliente" class="col-sm-2 col-form-label">Nombre del cliente</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="nombre_cliente" id="nombre_cliente" value="{{old ('nombre_cliente')}}" required>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="plan_venta" class="col-sm-2 col-form-label">Plan</label>
            <div class="col-sm-5">
                <input type="plan_venta" class="form-control" name="plan_venta" id="plan_venta" value="{{old ('plan_venta')}}" required>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="meses_venta" class="col-sm-2 col-form-label">Meses</label>
            <div class="col-sm-5">
                <input type="number" class="form-control" name="meses_venta" id="meses_venta" value="{{old ('meses_venta')}}">

            </div>
        </div>

        <div class="mb-3 row">
            <label for="marca_equipo" class="col-sm-2 col-form-label">Marca equipo</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="marca_equipo" id="marca_equipo" value="{{old ('marca_equipo')}}">

            </div>
        </div>

        <div class="mb-3 row">
            <label for="modelo_equipo" class="col-sm-2 col-form-label">Modelo del equipo</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="modelo_equipo" id="modelo_equipo" value="{{old ('modelo_equipo')}}">

            </div>
        </div>

        <div class="mb-3 row">
            <label for="calle_entrega" class="col-sm-2 col-form-label">Calle: </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="calle_entrega" id="calle_entrega" value="{{old ('calle_entrega')}}">

            </div>
        </div>
        <div class="mb-3 row">    
            <label for="numero_entrega" class="col-sm-2 col-form-label">Número: </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="numero_entrega" id="numero_entrega" value="{{old ('numero_entrega')}}">

            </div>        
        </div>
        
        <div class="mb-3 row">
            <label for="colonia_entrega" class="col-sm-2 col-form-label">Colonia: </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="colonia_entrega" id="colonia_entrega" value="{{old ('colonia_entrega')}}" rows="3"></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="municipio_entrega" class="col-sm-2 col-form-label">Municipio: </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="municipio_entrega" id="municipio_entrega" value="{{old ('municipio_entrega')}}" rows="3"></textarea>

            </div>
        </div>


        <div class="mb-3 row">
            <label for="referencia_entrega" class="col-sm-2 col-form-label">Referencias: </label>
            <div class="col-sm-5">
                <textarea class="form-control" name="referencia_entrega" id="municipio_entrega" value="{{old ('referencia_entrega')}}" rows="3"></textarea>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="url_maps" class="col-sm-2 col-form-label">URL de google maps</label>
            <div class="col-sm-5">
                <input type="url" class="form-control" name="url_maps" id="url_maps" value="{{old ('url_maps')}}">

            </div>
        </div>

        <div class="mb-3 row">
            <label for="total_mensual" class="col-sm-2 col-form-label">Total mensual</label>
            <div class="col-sm-5">
                <input type="number" class="form-control" name="total_mensual" id="total_mensual" value="{{old ('total_mensual')}}">

            </div>
        </div>

        <div class="mb-3 row">
            <label for="notas_vendedor" class="col-sm-2 col-form-label">Agregar notas</label>
            <div class="col-sm-5">
                <textarea class="form-control" name="notas_vendedor" id="notas_vendedor" value="{{old ('notas_vendedor')}}"></textarea>
            </div>
        </div>

        <a href= "{{ url('inicio') }}" class="btn btn-secondary">Regresar</a>


        <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>

        <script>
        document.getElementById('btnGuardar').addEventListener('click', function() {
            // Muestra un cuadro de diálogo de confirmación
            var confirmacion = confirm('¿Estás seguro de que deseas registrar la venta?');

            // Si el usuario hace clic en "Aceptar", se enviará el formulario
            if (confirmacion) {
                document.getElementById('registrarVenta').submit();
            }
            
        });
        </script>

        </form>

        
    </div>
</main>

@stop