@extends('inicios/asesor')

@section('title', 'Reenviar venta')

@section('contenido')

<main>

    <div class="container py-4">
        <h2>Reenviar venta</h2>

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


        <form action="{{ url('ventas/' . $venta->id) }}" method="post" id="aceptarVenta">
                @csrf
                @method('put')


        <div class="mb-3 row">
            <label for="linea_venta" class="col-sm-2 col-form-label">Linea del cliente</label>
            <div class="col-sm-5">
                <input type="tel" class="form-control" name="linea_venta" id="linea_venta"
                    value="{{$venta->linea_venta}}" >

            </div>
        </div>

        <div class="mb-3 row">
            <label for="nombre_cliente" class="col-sm-2 col-form-label">Nombre del cliente</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="nombre_cliente" id="nombre_cliente"
                    value="{{$venta->nombre_cliente}}" >

            </div>
        </div>

        <div class="mb-3 row">
                <label for="plan_venta" class="col-sm-2 col-form-label">Plan</label>
                <div class="col-sm-5">
                    <select class="form-control" name="plan_venta" id="plan_venta">
                        <option disabled selected>Seleccionar...</option>
                        <option value="Telcel Libre 1 $249" @if($venta->plan_venta == 'Telcel Libre 1 $249') selected @endif> Telcel Libre 1 $249</option>
                        <option value="Telcel Libre 2 $319" @if($venta->plan_venta == 'Telcel Libre 2 $319') selected @endif>  Telcel Libre 2 $319</option>
                        <option value="Telcel Libre 3 $399" @if($venta->plan_venta == 'Telcel Libre 3 $399') selected @endif> Telcel Libre 3 $399</option>
                        <option value="Telcel Libre 4 $499"@if($venta->plan_venta == 'Telcel Libre 4 $499') selected @endif> Telcel Libre 4 $499</option>
                        <option value="Telcel Libre 5 $599" @if($venta->plan_venta == 'Telcel Libre 5 $599') selected @endif> Telcel Libre 5 $599</option>
                        <option value="Telcel Libre 6 $699" @if($venta->plan_venta == 'Telcel Libre 6 $699') selected @endif> Telcel Libre 6 $699</option>
                        <option value="Telcel Libre 7 $799" @if($venta->plan_venta == 'Telcel Libre 7 $799') selected @endif> Telcel Libre 7 $799</option>
                        <option value="Telcel Libre 9 $999" @if($venta->plan_venta == 'Telcel Libre 9 $999') selected @endif> Telcel Libre 9 $999</option>
                        <option value="Telcel Libre 12 $1,299" @if($venta->plan_venta == 'Telcel Libre 12 $1,299') selected @endif> Telcel Libre 12 $1,299</option>
                        <option value="Telcel Libre VIP $1,499" @if($venta->plan_venta == 'Telcel Libre VIP $1,499') selected @endif> Telcel Libre VIP $1,499</option>
                        
                        <option value="Telcel Libre 1 $299 CC" @if($venta->plan_venta == 'Telcel Libre 1 $299 CC') selected @endif> Telcel Libre 1 $299 CC</option>
                        <option value="Telcel Libre 2 $369 CC" @if($venta->plan_venta == 'Telcel Libre 2 $319 CC') selected @endif> Telcel Libre 2 $369 CC</option>
                        <option value="Telcel Libre 3 $449 CC" @if($venta->plan_venta == 'Telcel Libre 3 $449 CC') selected @endif> Telcel Libre 3 $449 CC</option>
                        <option value="Telcel Libre 4 $549 CC" @if($venta->plan_venta == 'Telcel Libre 4 $549 CC') selected @endif> Telcel Libre 4 $549 CC</option>
                        <option value="Telcel Libre 5 $699 CC" @if($venta->plan_venta == 'Telcel Libre 5 $699 CC') selected @endif> Telcel Libre 5 $699 CC</option>
                        <option value="Telcel Libre 6 $799 CC" @if($venta->plan_venta == 'Telcel Libre 6 $799 CC') selected @endif> Telcel Libre 6 $799 CC</option>
                        <option value="Telcel Libre 7 $899 CC" @if($venta->plan_venta == 'Telcel Libre 7 $899 CC') selected @endif> Telcel Libre 7 $899 CC</option>
                        <option value="Telcel Libre 9 $1099 CC" @if($venta->plan_venta == 'Telcel Libre 9 $1099 CC') selected @endif> Telcel Libre 9 $1099 CC</option>
                        <option value="Telcel Libre 12 $1,399 CC" @if($venta->plan_venta == 'Telcel Libre 12 $1,399 CC') selected @endif> Telcel Libre 12 $1,399 CC</option>
                        <option value="Telcel Libre VIP $1,599 CC" @if($venta->plan_venta == 'Telcel Libre VIP $1,599 CC') selected @endif> Telcel Libre VIP $1,599 CC</option>
<!--                    <option value="Telcel Libre 1 $249 MPP" @if($venta->plan_venta == 'Telcel Libre 1 $249 MPP') selected @endif> Telcel Libre 1 $249 MPP</option>
                        <option value="Telcel Libre 2 $319 MPP" @if($venta->plan_venta == 'Telcel Libre 2 $319 MPP') selected @endif> Telcel Libre 2 $319 MPP</option>
                        <option value="Telcel Libre 3 $399 MPP" @if($venta->plan_venta == 'Telcel Libre 3 $399 MPP') selected @endif> Telcel Libre 3 $399 MPP</option>
                        <option value="Telcel Libre 4 $499 MPP" @if($venta->plan_venta == 'Telcel Libre 4 $499 MPP') selected @endif> Telcel Libre 4 $499 MPP</option>
                        <option value="Telcel Libre 5 $599 MPP" @if($venta->plan_venta == 'Telcel Libre 5 $599 MPP') selected @endif> Telcel Libre 5 $599 MPP</option>
                        <option value="Telcel Libre 6 $699 MPP" @if($venta->plan_venta == 'Telcel Libre 6 $699 MPP') selected @endif> Telcel Libre 6 $699 MPP</option>
                        <option value="Telcel Libre 7 $799 MPP" @if($venta->plan_venta == 'Telcel Libre 7 $799 MPP') selected @endif> Telcel Libre 7 $799 MPP</option>
                        <option value="Telcel Libre 9 $999 MPP" @if($venta->plan_venta == 'Telcel Libre 9 $999 MPP') selected @endif> Telcel Libre 9 $999 MPP</option>
                        <option value="Telcel Libre 1 $249 MPP CC" @if($venta->plan_venta == 'Telcel Libre 1 $249 MPP CC') selected @endif> Telcel Libre 1 $249 MPP CC</option>
                        <option value="Telcel Libre 2 $319 MPP CC" @if($venta->plan_venta == 'Telcel Libre 2 $319 MPP CC') selected @endif> Telcel Libre 2 $319 MPP CC</option>
                        <option value="Telcel Libre 3 $399 MPP CC" @if($venta->plan_venta == 'Telcel Libre 3 $399 MPP CC') selected @endif> Telcel Libre 3 $399 MPP CC</option>
                        <option value="Telcel Libre 4 $499 MPP CC" @if($venta->plan_venta == 'Telcel Libre 4 $499 MPP CC') selected @endif> Telcel Libre 4 $499 MPP CC</option>
                        <option value="Telcel Libre 5 $599 MPP CC" @if($venta->plan_venta == 'Telcel Libre 5 $599 MPP CC') selected @endif> Telcel Libre 5 $599 MPP CC</option>
                        <option value="Telcel Libre 6 $699 MPP CC" @if($venta->plan_venta == 'Telcel Libre 6 $699 MPP CC') selected @endif> Telcel Libre 6 $699 MPP CC</option>
                        <option value="Telcel Libre 7 $799 MPP CC" @if($venta->plan_venta == 'Telcel Libre 7 $799 MPP CC') selected @endif> Telcel Libre 7 $799 MPP CC</option>
                        <option value="Telcel Libre 9 $999 MPP CC" @if($venta->plan_venta == 'Telcel Libre 9 $999 MPP CC') selected @endif> Telcel Libre 9 $999 MPP CC</option>
-->
                    </select>

                </div>
            </div>

        <div class="mb-3 row">
            <label for="meses_venta" class="col-sm-2 col-form-label">Meses</label>
            <div class="col-sm-5">
                <input type="number" class="form-control" name="meses_venta" id="meses_venta"
                    value="{{$venta->meses_venta}}" >

            </div>
        </div>

        <div class="mb-3 row">
            <label for="marca_equipo" class="col-sm-2 col-form-label">Marca equipo</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="marca_equipo" id="marca_equipo"
                    value="{{$venta->marca_equipo}}" >

            </div>
        </div>

        <div class="mb-3 row">
            <label for="modelo_equipo" class="col-sm-2 col-form-label">Modelo del equipo</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="modelo_equipo" id="modelo_equipo"
                    value="{{$venta->modelo_equipo}}" >

            </div>
        </div>

        <div class="mb-3 row">
            <label for="calle_entrega" class="col-sm-2 col-form-label">Calle: </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="calle_entrega" id="calle_entrega"
                    value="{{$venta->calle_entrega}}" >
            </div>
        </div>

        <div class="mb-3 row">
            <label for="numero_entrega" class="col-sm-2 col-form-label">Número: </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="numero_entrega" id="numero_entrega"
                    value="{{$venta->numero_entrega}}" >

            </div>
        </div>

        <div class="mb-3 row">
            <label for="colonia_entrega" class="col-sm-2 col-form-label">Colonia: </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="colonia_entrega" id="colonia_entrega"
                    value="{{$venta->colonia_entrega}}" rows="3" ></textarea>
            </div>
        </div>

        <div class="mb-3 row">
                <label for="municipio_entrega" class="col-sm-2 col-form-label">Municipio</label>
                <div class="col-sm-5">
                    <select class="form-control" name="municipio_entrega" id="municipio_entrega">
                        <option disabled selected>Seleccionar...</option>
                        <option value="Allende" @if($venta->municipio_entrega == 'Allende') selected @endif> Allende</option>
                        <option value="Apodaca" @if($venta->municipio_entrega == 'Apodaca') selected @endif> Apodaca</option>
                        <option value="Cadereyta" @if($venta->municipio_entrega == 'Cadereyta') selected @endif> Cadereyta</option>
                        <option value="Cumbres" @if($venta->municipio_entrega == 'Cumbres') selected @endif> Cumbres</option>
                        <option value="García" @if($venta->municipio_entrega == 'García') selected @endif> García</option>
                        <option value="San Pedro Garza García" @if($venta->municipio_entrega == 'San Pedro Garza García') selected @endif>  San Pedro Garza García</option>
                        <option value="General Escobedo" @if($venta->municipio_entrega == 'General Escobedo') selected @endif> General Escobedo</option>
                        <option value="Guadalupe"@if($venta->municipio_entrega == 'Guadalupe') selected @endif> Guadalupe</option>
                        <option value="Ciudad Benito Juárez" @if($venta->municipio_entrega == 'Ciudad Benito Juárez') selected @endif> Ciudad Benito Juárez</option>
                        <option value="Montemorelos" @if($venta->municipio_entrega == 'Montemorelos') selected @endif> Montemorelos</option>
                        <option value="Monterrey" @if($venta->municipio_entrega == 'Monterrey') selected @endif> Monterrey</option>
                        <option value="San Nicolás de los Garza" @if($venta->municipio_entrega == 'San Nicolás de los Garza') selected @endif> San Nicolás de los Garza</option>
                        <option value="Santa Catarina" @if($venta->municipio_entrega == 'Santa Catarina') selected @endif> Santa Catarina</option>
                        <option value="Santiago" @if($venta->municipio_entrega == 'Santiago') selected @endif> Santiago</option>
                    </select>
                </div>
            </div>


        <div class="mb-3 row">
            <label for="referencia_entrega" class="col-sm-2 col-form-label">Referencias: </label>
            <div class="col-sm-5">
                <textarea class="form-control" name="referencia_entrega" id="municipio_entrega" rows="3"
                    >{{$venta->referencia_entrega}}</textarea>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="url_maps" class="col-sm-2 col-form-label">URL de google maps</label>
            <div class="col-sm-5">
                <input value="{{$venta->url_maps}}" class="form-control" name="url_maps" id="url_maps"
                    >
            </div>
        </div>

        <div class="mb-3 row">
            <label for="total_mensual" class="col-sm-2 col-form-label">Total mensual</label>
            <div class="col-sm-5">
                <input type="number" class="form-control" name="total_mensual" id="total_mensual"
                    value="{{$venta->total_mensual}}" >

            </div>
        </div>

        <div class="mb-3 row">
            <label for="notas_vendedor" class="col-sm-2 col-form-label">Notas</label>
            <div class="col-sm-5">
                <textarea class="form-control" name="notas_vendedor" id="notas_vendedor"
                    >{{$venta->notas_vendedor}}</textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="notas_MC" class="col-sm-2 col-form-label">Notas</label>
            <div class="col-sm-5">
                <textarea class="form-control-plaintext" name="notas_MC" id="notas_MC"
                    readonly>{{$venta->notas_MC}}</textarea>
            </div>
        </div>

        </form>

        <div style="float:right; margin-right:30px; margin-bottom:20px">
            <form action="{{ url('ventas/' . $venta->id . '/cancel') }}" method="post" id="rechazarVenta">
                @csrf
                @method('post')
                <button type="button" class="btn btn-danger btn-lg" id="btnRechazar">Cancelar</button>
                <script>
                document.getElementById('btnRechazar').addEventListener('click', function() {
                    // Muestra un cuadro de diálogo de confirmación
                    var confirmacion = confirm('¿Estás seguro de que deseas CANCELAR la venta?');

                    // Si el usuario hace clic en "Aceptar", se enviará el formulario
                    if (confirmacion) {
                        document.getElementById('rechazarVenta').submit();
                    }

                });
                </script>
            </form>
            <br><br>
            
                <button type="button" class="btn btn-success btn-lg" id="btnAceptar">Reenviar</button>
                <script>
                document.getElementById('btnAceptar').addEventListener('click', function() {
                    // Muestra un cuadro de diálogo de confirmación
                    var confirmacion = confirm('¿Estás seguro de que deseas REENVIAR la venta?');

                    // Si el usuario hace clic en "Aceptar", se enviará el formulario
                    if (confirmacion) {
                        document.getElementById('aceptarVenta').submit();
                    }

                });
                </script>
           
        </div>

        <br>

        <a href="{{ url()->previous()}}" class="btn btn-secondary">Regresar</a>

    </div>


</main>

@stop