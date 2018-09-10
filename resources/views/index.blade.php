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
        <div class="call-to-enter" style="background-color:#c0c0c0">¿Olvidaste tu usuario o contraseña?</div>
    </div>
@endif
    <!-- fin de login -->
    <section class="hero">
    @if( Auth::guest() )
        <div class="call-to-enter">&nbsp;<strong>Regístrate</strong> y obtén todos los beneficios.
            <br>
            <a href="{{ route('clientes.registrar') }}">
                <input type="button" value="Cliente" class="reg-cliente">
            </a>
            <a href="{{ route('negocios.registrar') }}">
                <input type="button" value="Empresa">
            </a>
        </div>
    @endif
        <p>&nbsp;</p>
        <img src="images/eucari-logo.png" alt="eucary" width="200" class="img-fluid">
        <p>&nbsp;</p>


    </section>
</main>

<!-- footer code goes here -->
<footer>
    <div class="pie">
        <p>La empresa <br>
            Historia <br>
            Propuesta de valor <br>
            Trabaja con nosotros </p>
    </div>
    <div class="pie">
        <p> Preguntas frecuentes <br>
            Servicio al cliente <br>
            Síguenos - Redes</p>
    </div>
    <div class="legales">&copy; 2018 Plataforma de Sinergia Comercial, S.A.</div>	</footer>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-4.0.0.js') }}"></script>
</body>
</html>