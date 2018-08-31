<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio | {{ config('app.name') }}</title>
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap-4.0.0.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout-styles.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<!-- body code goes here -->
<!-- contenido general code goes here -->
<main>
    <section class="hero">
        <div class="call-to-enter">
            @if( Auth::guest() )
                &nbsp;<strong>Regístrate</strong> y obtén todos los beneficios.
                <br>
                <a href="{{ route('clientes.registrar') }}"><input type="button" value="Cliente" class="reg-cliente"></a>
                <a href="{{ route('negocios.registrar') }}"> <input type="button" value="Empresa"></a></div>
            @else
                <a href="{{ route('logout') }}"> <input type="button" value="Cerrar Sesión"></a></div>
            @endif
            <span class="extra-logo" style="extra-logo">extra</span><span class="value-logo" style="value-logo">value</span>
        <div class="slogan">Más usas, más ahorras</div>
    </section>

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
                    <button type="submit">Ingresar</button>

                </div>
            </form>
        </section>
        <div class="call-to-enter" style="background-color:#c0c0c0">¿Olvidaste tu usuario o contraseña?</div>
    </div>
    <!-- fin de login -->
    @endif

    <section class="destacados">
        <div class="card col-md-4"><img src="https://www.conecto.mx/file/2016/08/home.png" alt="Card image cap"
                                        width="318" height="180" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">CAPELTIC</h5>
                <p class="card-text">10% de descuento en la compra de dos cafés.</p>
            </div>
        </div>
        <div class="card col-md-4"><img
                    src="http://static1.squarespace.com/static/56244314e4b0fd5726abd8bc/t/5625c078e4b0d3b12af001d9/1499108282075/"
                    alt="Card image cap" width="318" height="180" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">La Strada</h5>
                <p class="card-text">Ven a celebrar tu cumpleaños. Tu cuenta, va por nuestra cuenta.</p>
            </div>
        </div>
        <div class="card col-md-4"><img src="fotos/groupon-dibujo-460x279.jpg" alt="Card image cap" width="318"
                                        height="180" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Clases de Dibujo a domicilio</h5>
                <p class="card-text">Paga con monedas electrónicas. $M 450 por 3 meses.</p>
            </div>
        </div>
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
    <div class="legales">&copy; 2018 Plataforma de Sinergia Comercial, S.A.</div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-4.0.0.js') }}"></script>
</body>
</html>