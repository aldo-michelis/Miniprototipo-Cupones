<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comerciantes | {{ config('app.name') }}</title>
</head>
<body>
    <h1>Aplicacion de Comerciantes</h1>
    <label for="">Promos Entregadas: </label>
    <br>
    <label for="">$ {{$total}} </label>
    <br>
    <label for="">Saldo en MC: </label>
    <br>
    <label for="">$ {{$total}} </label>
    <br>
    <a href="{{ route('negocios.agregar') }}">Publicar Bonos</a>
    <br>
    <a href="{{ route('negocios.validar') }}">Validar Bonos</a>
    <br>
    <a href="{{ route('preconfigurar') }}">Cupones Preconfigurados</a>
    <br>
    <a href="{{ route('preconfigurar') }}">Cobro con Monedas Circulantes</a>
    <br>
    <a href="{{ route('logout') }}">Salir</a>
</body>
</html>