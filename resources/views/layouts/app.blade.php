<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap-4.0.0.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout-styles-euca.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- body code goes here -->
<header>
    <!--input type="hidden" id="path" value="{{ url('') }}" >
    <section class="menu">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #5970B6;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @include('layouts.menu')
            <div class="busca-gen" align="right">
                <form action="#">
                    <input type="text" placeholder="Buscar Promociones" name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </nav>

    </section-->
    <section class="hd-logo"><span class="extra-logo-sm">eucari</span></section>

    @include('layouts.totales')

    @include('layouts.errors')

    @include('layouts.messages')

    <section class="RB">
        @if( auth()->check() )
            @if( Auth::user()->user_type == 1 )
                <div>
                    <a href="{{ route('negocios.agregar') }}">Publicar Bonos</a>
                </div>
                <div>
                    <a href="{{ route('negocios.validar') }}">Valdiar Bonos</a>
                </div>
                <div>
                    <a href="{{ route('preconfigurar') }}">Cupones Preconfigurados</a>
                </div>
                <div>
                    <a href="{{ route('negocios.cobrar') }}">Pagos con Monedas</a>
                </div>
                <div>
                    <a href="{{ route('negocios.publicar') }}">Publicar Slots</a>
                </div>
            @else
                <div>
                    <a class="dropdown-item" href="{{ route('clientes.pagar') }}">Pagar con Monedas</a>
                </div>
                <div>
                    <a class="dropdown-item" href="{{ route('clientes.listar') }}">Buscar Promociones</a>
                </div>
                <div>
                    <a class="dropdown-item" href="{{ route('clientes.adquirirslot') }}">Adquitir Slots</a>
                </div>
            @endif
                <div>
                    <a href="{{ route('logout') }}">Cerrar Sesión</a>
                </div>
        @endif
    </section>


    <section class="RB">
        @if ( isset($slots) && auth()->user()->user_type == 2 )
            @include('customers.cupones')
            <p> <a href="#">+ Adquirir nuevo RB</a></p>
        @endif
    </section>

</header>
{{ csrf_field() }}
@yield('content')


<!--footer>
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
</footer-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-4.0.0.js') }}"></script>
<!-- Sweet Alert-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('js/pages/customers.js') }}"></script>

@yield('scripts')

@yield('modals')
</body>
</html>