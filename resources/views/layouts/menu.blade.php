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
                @if( Auth::user()->user_type == 1 )
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Negocio
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('negocios.agregar') }}">Publicar Bonos</a>
                            <a class="dropdown-item" href="{{ route('negocios.validar') }}">Valdiar Bonos</a>
                            <a class="dropdown-item" href="{{ route('preconfigurar') }}">Cupones Preconfigurados</a>
                            <a class="dropdown-item" href="{{ route('negocios.cobrar') }}">Pagos con Monedas</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cliente
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('clientes.pagar') }}">Pagar con Monedas</a>
                            <a class="dropdown-item" href="{{ route('clientes.listar') }}">Buscar Promociones</a>
                        </div>
                    </li>
                @endif
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