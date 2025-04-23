@extends((Auth::user()->puesto_empleado == 0) ? 'inicios.admin' : 
        ((Auth::user()->puesto_empleado == 6) ? 'inicios.analista' : 'inicios.analista'))

@section('title', 'Ventas entregadas')

@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-EuE3/ZBAHoP+exE64/Zf2Fc13mkz3DdXPWzzOxRmAnrmhKk2B1LG5+eyk3GGGVjY" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-28W6oA5Q3+0MyJ2TCv8+uhk8FV7yb9li2B2s9w2D6R9C6kwxMqEkgJXwh8zKQLcC" crossorigin="anonymous">
</script>

<main>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nombre del que entregó</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <select name="select" class="form-select" id="nombreRepartidor">
                        @foreach($repartidores as $repartidor)
                            <option value="{{$repartidor->id}}">{{$repartidor->nombre}}</option>
                        @endforeach
                    </select> 
                    <input type="hidden" value="" id="idSelected">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="send()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-4">

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

        <h2>Ventas entregadas</h2>
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>ID venta</th>
                    <th>Linea</th>
                    <th>Nombre del cliente</th>
                    <th>fecha de entrega</th>
                    <th></th>

                </tr>
            </thead>

            <br>
            <tbody>
                @foreach($ventas as $venta)
                <tr>

                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->linea_venta }}</td>
                    <td>{{ $venta->nombre_cliente }}</td>
                    <td>{{ $venta->ruta->fecha_entrega }}</td>
                    <td><button type="button" class="btn btn-info" onclick="descarga('{{$venta->linea_venta}}')">Identificación</button></td>
                    <form action="{{  url('ventas/' .$venta->id. '/finalizar') }}" method="post" id="form{{$venta->id}}">
                        @csrf
                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="cambiarHidden( '{{$venta->id}}')">Finalizar</button></td>
                        <input type="hidden" value="" id="venta{{$venta->id}}" name="repartidor">
                    </form>

                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
    <script>
    function confirmar(id) {
        var confirmacion = confirm("Estas seguro de que deseas finalizar la venta?");
        var form = document.getElementById('form' + id);
        if (confirmacion) {
            form.submit();
        }
    }

    function cambiarHidden(id) {
        document.getElementById("idSelected").value = id;
    }

    function send() {
        var id = document.getElementById('idSelected').value;
        var repartidor = document.getElementById('nombreRepartidor').value;
        document.getElementById('venta' + id).value = repartidor;
        confirmar(id)
    }

    function descarga(linea){
        window.location.href = 'descargaINE/'+linea; // Reemplaza FILE_ID con el ID del archivo

    }
    document.getElementById('downloadButton').addEventListener('click', function() {
        window.location.href = '/descargaINE/FILE_ID'; // Reemplaza FILE_ID con el ID del archivo
    });
    </script>
</main>


@stop