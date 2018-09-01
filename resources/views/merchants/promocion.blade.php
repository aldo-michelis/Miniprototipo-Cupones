<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Aplicacion de Comerciantes</h1>
    @include('layouts.totales')
    <h3>Enlace de Promoción</h3>
    <a href="http://cupones.com/promocion/{{ $enlace }}" target="_blank">http://cupones.com/promocion/{{ $enlace }}</a>
</body>
</html>