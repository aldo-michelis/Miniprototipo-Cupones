<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio | {{ config('app.name') }}</title>
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap-4.0.0.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout-styles-euca.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<!-- body code goes here -->
<!-- contenido general code goes here -->
<main>
@if( Auth::guest() )
    <!-- login -->
        <div class="registro-inic">
            <section class="acceder">
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div>
                        <input type="text" id="username" name="username" placeholder="usuario">
                        <input type="password" id="password" name="password" placeholder="contraseña">
                        <br>
                        <label>
                            <input type="checkbox"> Mantenerme Conectado
                        </label>
                        &nbsp;
                        <a href="clientes.html"><button type="submit">Ingresar</button></a>

                    </div>
                </form>
            </section>
            <section class="hd-logo"><span class="extra-logo-sm">eucari</span></section>
        </div>
@endif
<!-- fin de login -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <section class="hero">
        <h1><strong>En Construcción</strong></h1>
        <p>Muy pronto estará disponible en este espacio todo lo bueno que pueden ofrecer los establecimientos que frecuentas para agradecer tu preferencia.</p>
        <p></p>
        <p>
            Si quieres participar como establecimiento, regístrate
            <a href="{{ route('negocios.registrar') }}">Aquí</a>
        </p>
        <p>&nbsp;</p>
        <img src="images/eucari-logo.png" alt="eucary" width="200" class="img-fluid">
        <p>&nbsp;</p>
    </section>
</main>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-4.0.0.js') }}"></script>
</body>
</html>