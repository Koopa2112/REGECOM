@extends((Auth::user()->puesto_empleado == 4) ? 'inicios.logistica' : 
        ((Auth::user()->puesto_empleado == 0) ? 'inicios.admin' : 'inicios.logistica'))

@section('title', 'Descargar hoja de comisiones')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Descargar hoja de comisiones</h2>

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

        <form action="{{ url('acuses/dwlComisiones') }}" method="GET" id="registrarFecha">
            @csrf
            <div class="mb-3 row">
                <label for="month" class="col-sm-2 col-form-label">Seleccionar Mes:</label>
                <div class="col-sm-5">
                        <input type="month" id="month" name="month" required class="form-control" min="2024-05" max="{{@today()->addDays(30)->format('Y-m')}}" >
                </div>
            </div>

            <a href="{{ url('acuses/') }}" class="btn btn-secondary">Regresar</a>


            <button  class="btn btn-success" id="btnDescargar" type="submit" value="submit">Descargar</button>

        </form>

    </div> <br>

</main>

@stop