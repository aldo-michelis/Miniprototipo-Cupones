<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clientes Inicio | {{ config('app.name') }}</title>
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap-4.0.0.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout-styles.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<!-- body code goes here -->
<header>
    <section class="menu">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #C13048;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Negocio
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('negocios.agregar') }}">Publicar Bonos</a>
                            <a class="dropdown-item" href="{{ route('negocios.validar') }}">Valdiar Bonos</a>
                            <a class="dropdown-item" href="{{ route('preconfigurar') }}">Cupones Preconfigurados</a>
                            <a class="dropdown-item" href="{{ route('negocios.cobrar') }}">Cobro con Monedas Circulantes</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Salir</a>
                    </li>

                </ul>
            </div>
        </nav>
    </section>
    <section class="hd-logo">
        <span class="extra-logo-sm">extra</span><span class="value-logo-sm" style="value-logo">value</span></section>

    @include('layouts.totales')
</header>

<main>
    @if( isset($preconf) )
        <form action="{{ route('promocion.salvar') }}" method="post">
            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}">
            <h3 class="card-title m-t-15">Promocion Preconfigurada.</h3>
            <label for="">Url del Cupon</label>
            <br>
            cupones.com/<input type="text" name="url" id="url">
            <br>
            @else
                <form action="{{ route('negocios.salvar') }}" method="post">
                    <h3 class="card-title m-t-15">Agregar Cupones.</h3>
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    @endif
                    {{ csrf_field() }}
                    <label for="">Tipo de Moneda</label>
                    <br>
                    <select name="currency" id="currency" required>
                        <option value="">Seleccione uno</option>
                        <option value="1">Cupon</option>
                        <option value="2">Moneda Circulante</option>
                    </select>
                    <br>
                    <label class="control-label">Cantidad de Cupones</label><br>
                    <input type="number" id="qty" name="qty" required>
                    <br>
                    <label class="control-label">Valor de Cada Cupon</label><br>
                    <input type="number" id="value" name="value" required>
                    <br>
                    <label >Descripción</label><br>
                    <textarea id="description" name="description" rows="8" clos="10" required></textarea>
                    <br>
                    <button type="submit">Guardar</button>

                </form>
</main>


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
<script src="{{ asset('') }}js/jquery-3.2.1.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-4.0.0.js') }}"></script>
<script src="{{ asset('js/pages/merchants.agregar.js') }}"></script>
</body>
</html>