@extends('inicios/asesor')

@section('title', 'Ver venta')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Ver venta</h2>

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

        <form action="{{ url('ventas') }}" method="post" id="verVentas">

            @csrf

            <div class="mb-3 row">
                <label for="linea_venta" class="col-sm-2 col-form-label">Linea del cliente</label>
                <div class="col-sm-5">
                    <input type="tel" class="form-control-plaintext" name="linea_venta" id="linea_venta"
                        value="{{$venta->linea_venta}}" readonly>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="nombre_cliente" class="col-sm-2 col-form-label">Nombre del cliente</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control-plaintext" name="nombre_cliente" id="nombre_cliente"
                        value="{{$venta->nombre_cliente}}" readonly>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="plan_venta" class="col-sm-2 col-form-label">Plan</label>
                <div class="col-sm-5">
                    <input type="plan_venta" class="form-control-plaintext" name="plan_venta" id="plan_venta"
                        value="{{$venta->plan_venta}}" readonly>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="meses_venta" class="col-sm-2 col-form-label">Meses</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control-plaintext" name="meses_venta" id="meses_venta"
                        value="{{$venta->meses_venta}}" readonly>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="marca_equipo" class="col-sm-2 col-form-label">Marca equipo</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control-plaintext" name="marca_equipo" id="marca_equipo"
                        value="{{$venta->marca_equipo}}" readonly>

                </div>
            </div>

            @if($venta->id_zona != null)
            <div class="mb-3 row">
                <label for="id_zona" class="col-sm-2 col-form-label">Zona asignada</label>
                <div class="col-sm-5">
                    <input type="text" style="background-color:yellow" class="form-control-plaintext" name="id_zona"
                        id="id_zona" value="{{$zona->nombre_zona}}" readonly>

                </div>
            </div>
            @endif

            <div class="mb-3 row">
                <label for="modelo_equipo" class="col-sm-2 col-form-label">Modelo del equipo</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control-plaintext" name="modelo_equipo" id="modelo_equipo"
                        value="{{$venta->modelo_equipo}}" readonly>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="calle_entrega" class="col-sm-2 col-form-label">Calle: </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control-plaintext" name="calle_entrega" id="calle_entrega"
                        value="{{$venta->calle_entrega}}" readonly>

                </div>
            </div>
            <div class="mb-3 row">
                <label for="numero_entrega" class="col-sm-2 col-form-label">Número: </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control-plaintext" name="numero_entrega" id="numero_entrega"
                        value="{{$venta->numero_entrega}}" readonly>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="colonia_entrega" class="col-sm-2 col-form-label">Colonia: </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control-plaintext" name="colonia_entrega" id="colonia_entrega"
                        value="{{$venta->colonia_entrega}}" rows="3" readonly></textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="municipio_entrega" class="col-sm-2 col-form-label">Municipio: </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control-plaintext" name="municipio_entrega" id="municipio_entrega"
                        value="{{$venta->municipio_entrega}}" rows="3" readonly></textarea>

                </div>
            </div>


            <div class="mb-3 row">
                <label for="referencia_entrega" class="col-sm-2 col-form-label">Referencias: </label>
                <div class="col-sm-5">
                    <textarea class="form-control-plaintext" name="referencia_entrega" id="municipio_entrega" rows="3"
                        readonly>{{$venta->referencia_entrega}}</textarea>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="url_maps" class="col-sm-2 col-form-label">URL de google maps</label>
                <div class="col-sm-5">
                    <a href="{{$venta->url_maps}}" class="form-control-plaintext" name="url_maps" id="url_maps"
                        readonly>{{$venta->url_maps}}</a>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="total_mensual" class="col-sm-2 col-form-label">Total mensual</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control-plaintext" name="total_mensual" id="total_mensual"
                        value="{{$venta->total_mensual}}" readonly>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="notas_vendedor" class="col-sm-2 col-form-label">Notas</label>
                <div class="col-sm-5">
                    <textarea class="form-control-plaintext" name="notas_vendedor" id="notas_vendedor"
                        readonly>{{$venta->notas_vendedor}}</textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="notas_MC" class="col-sm-2 col-form-label">Notas mesa de control</label>
                <div class="col-sm-5">
                    <textarea class="form-control-plaintext" name="notas_MC" id="notas_MC"
                        readonly>{{$venta->notas_MC}}</textarea>
                </div>
            </div>

            <a href="{{ url()->previous()}}" class="btn btn-secondary">Regresar</a>





        </form>


    </div>
</main>

@stop