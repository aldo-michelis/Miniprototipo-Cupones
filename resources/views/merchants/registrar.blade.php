<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registo Negocios | {{ config('app.name') }}</title>
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap-4.0.0.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout-styles.css') }}">

</head>
<body>
<!-- body code goes here -->
<!-- header code goes here -->

<header>
    <section class="menu">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #C13048;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categorías
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Destacados</a>
                            <a class="dropdown-item" href="#">Servicios</a>
                            <a class="dropdown-item" href="#">Restaurantes</a>
                            <a class="dropdown-item" href="#">Experiencias</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Acerca</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Marcas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ayuda</a>
                    </li>

                </ul>
            </div>
        </nav>
    </section>
    <section class="search">
    </section>
    <section class="hd-logo">
        <span class="extra-logo-sm">extra</span><span class="value-logo-sm" style="value-logo">value</span></section>
    <!--
      <section class="edoCuenta">
        Monedas Electrónicas $200  Descuentos acumulados $500.00
    </section>
-->
</header>

<!-- end of header -->

<main>
    <h1>Registro de empresa</h1>
    <section class="reg-cliente">
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
    </section>
    <p>&nbsp;</p></main>

<!-- inicia el footer -->

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