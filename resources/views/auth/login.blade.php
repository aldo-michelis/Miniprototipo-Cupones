<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | {{ config('app.name') }}</title>
</head>
<body>
<form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div>
        <label>Usuario</label>
        <input type="text" id="username" name="username">
    </div>
    <div>
        <label>Contraseña</label>
        <input type="password" id="password" name="password">
    </div>
    <label>
        <input type="checkbox"> Mantenerme Conectado
    </label>
    <br>
    <button type="submit">Ingresar</button>
</form>
</body>
</html>