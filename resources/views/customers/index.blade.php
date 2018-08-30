<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes | {{ config('app.name') }}</title>
</head>
<body>
    <h1>Aplicación de Clientes</h1>
    <label for="">Consumos Gratuitos Totales:</label>
    <br>
    <label for="">${{ number_format( Auth::user()->totalDePromociones(), 2, '.', ',')    }}</label>
    <br>
    <br>
    <a href="{{ route('clientes.listar') }}">Buscar Cupones</a>
    <br>
    <br>
    <a href="{{ route('logout') }}">Cerrar Sesión</a>
</body>
</html>