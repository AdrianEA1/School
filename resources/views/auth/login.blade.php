<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div>
        <img src="{{asset('images/beePresent.png')}}" alt="beePresent.png" style="max-width: 5%">
        <label>Escuela Secundaria Ejemplo #1</label>
    </div>
    <h1>Iniciar Sesión</h1>
    <h1>Inicia sesión con tu correo electronico</h1>
    <form action="{{ route('auth.login') }}" method="POST">
        @csrf
        <label>Correo</label>
        <input type="text" name="email" required>
        <br>
        <label>Contraseña</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Iniciar sesión" >
    </form>


</body>
</html>
