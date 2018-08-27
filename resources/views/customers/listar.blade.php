<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buscar Cupones | {{ config('app.name') }}</title>
</head>
<body>
<table border="1">
    <thead>
    <tr>
        <th>#</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach( $cuopons as $cuopon )
        <tr>
            <td>{{ $cuopon->id }}</td>
            <td>
                {{ $cuopon->user->name }} | ${{ $cuopon->value }}
                <br>
                {{ $cuopon->description }}
                <br>
                <a href="{{ route('clientes.cupon',['id' => $cuopon->id]) }}">Seleccionar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>