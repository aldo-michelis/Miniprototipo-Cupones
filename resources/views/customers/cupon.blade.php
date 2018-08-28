<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Obtener Cupon | {{ config('app.name') }}</title>
</head>
<body>
<h1>Aplicación de Clientes</h1>
<label for="">Consumos Gratuitos Totales:</label>
<br>
<label for="">${{ number_format($total, 2, '.', ',')    }}</label>
<br>
<br>
<label for="">Negocio: {{ $coupon->user->name }}</label>
<br>
<label for="">Valor: ${{ number_format($coupon->value,2,'.',',') }}</label>
<br>
<label for="">Descripción: {{ $coupon->description }}</label>
<br>
<label for="">Codigo: {{ $coupon->details[0]->code }}</label>
<br>
<br>
<a href="{{ route('clientes.listar') }}">Seguir buscando</a>
</body>
</html>