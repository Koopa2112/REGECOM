@extends('inicios/analista')

@section('title', 'Ventas entregadas')

@section('contenido')
<main>
    <div class="container py-4">

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

                    <th>{{ $venta->id }}</th>
                    <th>{{ $venta->linea_venta }}</th>
                    <th>{{ $venta->nombre_cliente }}</th>
                    <th>{{ $venta->ruta->fecha_entrega }}</th>
                    <form action="{{  url('ventas/' .$venta->id. '/finalizar') }}" method="post" id="form{{$venta->id}}">
                        @csrf
                    <th><button
                            class="btn btn-primary btn-small" type="button" onclick="enviar('{{$venta->id}}')">Finalizar</button></th>
                    </form>
                    

                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
    <script>
        function enviar(id){
            var confirmacion = confirm("Estas seguro de que deseas finalizar la venta?");
            var form = document.getElementById('form'+id)
            if(confirmacion){
                form.submit();
        }
        }
        
    </script>
</main>


@stop