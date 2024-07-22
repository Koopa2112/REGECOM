@extends((Auth::user()->puesto_empleado == 4) ? 'inicios.logistica' :
((Auth::user()->puesto_empleado == 0) ? 'inicios.admin' : 'inicios.logistica'))

@section('title', 'Acuses')

@section('contenido')

<main>

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

<link rel="stylesheet" type="text/css" href="/REGECOM/resources/css/animations.css">
        <div class="modal fade" id="fecha_sellado" tabindex="-1" aria-labelledby="fecha_selladoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fecha_selladoLabel">Agregar fecha</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{  url('acuses/sellar') }}" method="POST" id="formCreateAcuse">
                    <div class="modal-body">
                        @csrf
                        <input type="date" id="fecha_sellado" class="form-control" name="fecha_sellado">
                        <input type="hidden" id="idHidden" name="id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <h2>Acuses</h2>
        <!--
        <th><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fecha_sellado">Crear</button></th>
        -->
        <table class="table table-striped">

            <thead>
                <tr>
                    <th style="text-align: center;">ID Acuse</th>
                    <th style="text-align: center;">Dia</th>
                    <th style="text-align: center;">Total de lineas</th>
                    <th style="text-align: center;"></th>
                    <th style="text-align: center;">Info</th>
                </tr>
            </thead>

            <br>
            <tbody>
                @foreach($acuses as $acuse)
                <tr>
                    <td style="text-align: center;">{{ $acuse->id }}</td>
                    <td style="text-align: center;">{{ $acuse->fecha_creado }}</td>
                    <td style="text-align: center;">{{ $acuse->ventas_count }}</td>
                    <th style="text-align: center;">@if($acuse->cerrado) 
                        @if($acuse->fecha_sellado == null)
                        <button type="button" onclick="ajustarId('{{ $acuse->id }}')" class="btn btn-success btn-small" data-bs-toggle="modal" data-bs-target="#fecha_sellado">Marcar Sello</button>
                        @else
                        Fecha sello: {{$acuse->fecha_sellado}}
                        @endif
                        @else
                        <button type="button" onclick="cerrar('{{ $acuse->id }}')"  
                            class="btn btn-danger btn-small" id="btn-cerrar-{{ $acuse->id }}">Cerrar acuse</button>
                        @endif</th>
                    <td style="text-align: center;"><a href="acuses/ {{ $acuse->id }}/view" class="btn btn-secondary btn-small">  Ver acuse  </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
    function cerrar(id) {
        if (confirm("¿Está seguro que desea cerrar el acuse? \nESTA ACCIÓN NO SE PODRÁ DESHACER")) {
            fetch(`acuses/${id}/cerrar`, {
                    method: 'PUT',  // Cambiado a PUT
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        const button = document.getElementById(`btn-cerrar-${id}`);
                        button.classList.add('fade-out');

                        // Esperar a que termine la animación antes de reemplazar el botón
                        button.addEventListener('animationend', () => {
                            const link = document.createElement('a');
                            link.href = `acuses/${id}/view`;
                            link.className = 'btn btn-primary btn-small fade-in';
                            link.textContent = '  Ver acuse  ';

                            button.parentNode.replaceChild(link, button);
                            window.location.href = 'acuses';
                        });
                    } else {
                        alert('Error al cerrar el acuse.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error general' + error);
                });
        }
    }

    function ajustarId(id){
        var inputHidden = document.getElementById("idHidden");
        inputHidden.value = id;
    }
</script>

</main>
@stop