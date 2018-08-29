<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | {{ config('app.name') }}</title>
</head>
<body>
@if( Auth::check() )
    <a href="{{ route('logout') }}">Salir</a>
@else
    <a href="{{ route('clientes.registrar') }}">Registro para Clientes</a><br>
    <a href="{{ route('negocios.registrar') }}">Registro para Negocios</a><br>
    <a href="{{ route('preconfigurar') }}">Cupones Preconfigurados</a><br>
    <a href="{{ route('login') }}">Acceder</a>
@endif
</body>
</html>