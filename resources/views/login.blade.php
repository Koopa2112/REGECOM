

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Community Phone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    
</body>
    

    <div class= "px-4 py-5 my-5 text-center">
         <img src="{{URL::asset('images/logo.png')}}" widht="200" height="200"> <br>

        <h1 class="display-5 fw-bold text-body-emphasis">Inicio de sesión | Community Phone</h1>
        
    </div>
    <form method="POST" class="text-center">
            @csrf
            <label>
                <input name="user" type="text" placeholder="Intruduce tu usuario">
            </label><br>

            <label>
                <input name="password" type="password" placeholder="Intruduce tu contraseña">
            </label><br>

            <button type="submit">Iniciar Sesión</button>

    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>