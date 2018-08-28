<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes | {{ config('app.name') }}</title>
</head>
<body>
    <form action="{{ route('clientes.registrar') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" id="suer_type" name="user_type" value="2">
        <div>
            <label for="name">Nombre Completo</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="username">Numero Celular</label>
            <input type="tel" name="username" id="usernae">
        </div>
        <div>
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="password_confirm">Confirmar Contraseña</label>
            <input type="password" name="password_confirm" id="password_confirm">
        </div>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>