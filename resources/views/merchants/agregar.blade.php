<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar Cupones | {{ config('app.name') }}</title>
</head>
<body>
@if( isset($preconf) )
    <form action="{{ route('promocion.salvar') }}" method="post">
        <input type="hidden" id="user_id" name="user_id" value="{{ Auth }}">
        <h3 class="card-title m-t-15">Promocion Preconfigurada.</h3>
        <label for="">Url del Cupon</label>
        <br>
        cupones.com/<input type="text" name="url" id="url">
@else
    <form action="{{ route('negocios.salvar') }}" method="post">
    <h1>Aplicacion de Comerciantes</h1>
    <label for="">Promos Entregadas: </label>
    <br>
    <label for="">$ {{$total}} </label>
    <br>
    <h3 class="card-title m-t-15">Agregar Cupones.</h3>
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
@endif
    {{ csrf_field() }}
    <label class="control-label">Cantidad de Cupones</label><br>
    <input type="text" id="qty" name="qty" required>
    <br>
    <label class="control-label">Valor de Cada Cupon</label><br>
    <input type="text" id="value" name="value" required>
    <br>
    <label >Descripción</label><br>
    <textarea id="description" name="description" rows="8" clos="10" required></textarea>
    <br>
    <button type="submit">Guardar</button>

</form>
</body>
</html>