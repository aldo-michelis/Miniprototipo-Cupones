<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar | {{ config('app.name') }}</title>
</head>
<body>
    <form action="{{ route('negocios.registrar') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="user_type" id="user_type" value="1">
        <div>
            <label for="">Nombre del Negocio</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="">Nombre del Contacto</label>
            <input type="text" name="contact_name" id="contact_name">
        </div>
        <div>
            <label for="">Telefono</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="">Giro</label>
            <input type="text" name="brand" id="brand">
        </div>
        <div>
            <label for="">Codigo Postal</label>
            <input type="text" name="postalcode" id="user_id">
        </div>
        <div>
            <label for="">Contraseña</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="">Confimar Contraseña</label>
            <input type="password" name="password_confirm" id="password_confirm">
        </div>
        <input type="submit" value="Registrar Negocio">
    </form>
</body>
</html>