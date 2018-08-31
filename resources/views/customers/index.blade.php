<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clientes Inicio | {{ config('app.name') }}</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.0.0.css" rel="stylesheet">
    <link href="css/layout-styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- body code goes here -->
<header>
    <section class="search">
        <form><input type="search"><button type="submit">Buscar</button></form>
    </section>
    <section class="menu">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #C13048;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="login.html">Home <span class="sr-only">(current)</span></a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Salir</a>
                    </li>

                </ul>
            </div>
        </nav>
    </section>

    <section class="hd-logo">
        <span class="extra-logo-sm">extra</span><span class="value-logo-sm" style="value-logo">value</span></section>


    <section class="edoCuenta"> Monedas Electrónicas <strong>$200</strong> <br>
        Descuentos acumulados <strong>${{ number_format( Auth::user()->totalDePromociones(), 2, '.', ',')    }}</strong></section>

</header>

<main>
    <section class="destacados">
        <h1>Promociones destacadas</h1>
        <div class="card col-md-4"> <img src="https://www.conecto.mx/file/2016/08/home.png" alt="Card image cap" width="318" height="180" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">CAPELTIC</h5>
                <p class="card-text">10% de descuento en la compra de dos cafés.</p>
            </div>
        </div>
        <div class="card col-md-4"> <img src="http://static1.squarespace.com/static/56244314e4b0fd5726abd8bc/t/5625c078e4b0d3b12af001d9/1499108282075/" alt="Card image cap" width="318" height="180" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">La Strada</h5>
                <p class="card-text">Ven a celebrar tu cumpleaños. Tu cuenta, va por nuestra cuenta.</p>
            </div>
        </div>
        <div class="card col-md-4"> <img src="fotos/groupon-dibujo-460x279.jpg" alt="Card image cap" width="318" height="180" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Clases de Dibujo a domicilio</h5>
                <p class="card-text">Paga con monedas electrónicas. $M 450 por 3 meses.</p>
            </div>
        </div>
    </section>
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
    <div class="legales">&copy; 2018 Plataforma de Sinergia Comercial, S.A.</div>	</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-3.2.1.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.0.0.js"></script>
</body>
</html>