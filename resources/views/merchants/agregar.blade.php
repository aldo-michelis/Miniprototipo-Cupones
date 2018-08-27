<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ route('negocios.salvar') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <h3 class="card-title m-t-15">Agregar Cupones.</h3>
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