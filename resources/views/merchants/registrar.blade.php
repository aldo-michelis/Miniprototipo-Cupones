<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Registro Clientes | PromoCupones</title>
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap-4.0.0.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout-styles-euca.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- body code goes here -->
<header>
    <input type="hidden" id="path" value="{{ url('') }}" >
    <section class="menu">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #5970B6;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        @include('layouts.menu')
        <!--búsqueda funciona un poco raro :( -->
            <div class="busca-gen" align="right">
                <form action="#">
                    <input type="text" placeholder="Buscar Promociones" name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <!--Fin de la búsqueda que funciona un poco raro :( -->

        </nav>

    </section>
    <section class="hd-logo"><span class="extra-logo-sm">eucari</span></section>
    @include('layouts.errors')
</header>

<!-- end of header -->
<main>
    <h1>Registro de empresa</h1>
    <section class="reg-cliente">
        <form action="{{ route('negocios.registrar') }}" method="POST" enctype="multipart/form-data">
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
            <div>
                <label for="">Logo</label>
                <input type="file" name="logo" id="logo">
            </div>
            <div>
                <input type="submit" value="Registrar Negocio">
            </div>
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
    <div class="legales">&copy; 2018 Plataforma de Sinergia Comercial, S.A.</div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-4.0.0.js') }}"></script>
<!-- Sweet Alert-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@yield('scripts')

@yield('modals')
</body>
</html>