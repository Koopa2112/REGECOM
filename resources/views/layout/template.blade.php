<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="color:blue">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('inicio') }}">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown"
            aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
                @yield('opciones')
            </ul>
        </div>
        <div class="align-right">
            <form id="logout" action="{{ url('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-success">Cerrar sesión</button>
            </form>
        </div>

</nav>
<br>
<body>
    <main>
    <div style=" height: 80vh; background-image: URL('https://cpdatelcel.com/public/images/logo_transparente.png') ;background-repeat: no-repeat; 
            background-position: center; margin: 0; padding: 0">
            @yield('contenido')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
    </main>
</body>
</html>