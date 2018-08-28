<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Valida Codigos | {{ config('app.name') }}</title>
</head>
<body>
<h1>Aplicacion de Comerciantes</h1>
<label for="">Promos Entregadas: </label>
<br>
<label for="">$ {{$total}} </label>
<br>
<h3>Validar Cupones</h3>
@if( !isset($cupon) )
<form action="{{ route('negocios.buscar') }}" method="post">
    {{ csrf_field() }}
    <label for="">Ingrese Código: </label>
    <input type="text" name="search" id="search">
    <input type="submit" value="Buscar Código">
</form>
@endif

@if( isset($cupon) )
    <form action="{{ route('negocios.buscar') }}" method="post">
        {{ csrf_field() }}
        <label for="">{{ $cupon->coupon->description }}</label><br>
        <input type="hidden" name="cupon_id" id="cupon_id" value="{{ $cupon->id }}">
        <input type="submit" value="Validar Código">
    </form>
@endif
</body>
</html>