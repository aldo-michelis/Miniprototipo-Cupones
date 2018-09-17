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
    <section class="hd-logo"><span class="extra-logo-sm">eucari</span></section>

    @include('layouts.totales')

    @include('layouts.errors')

    @include('layouts.messages')
</header>
{{ csrf_field() }}
<label>{{ auth()->user()->username }}</label>
<main>
    <section class="RB">
        @if ( isset($slots) && auth()->user()->user_type == 2 )
            @include('customers.cupones')
        @endif
    </section>

    @yield('content')

    <section>
        @if( auth()->check() )
            <div>
                <a href="{{ url('') }}">Inicio</a>
            </div>
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
                    <a href="{{ route('negocios.publicar') }}">Publicar Portador</a>
                </div>
            @else
                <div>
                    <a id="get-slot" href="#">Adquirir Nuevo Portador</a>
                </div>
                <div>
                    <a href="{{ route('clientes.pagar') }}">Pagar con Monedas</a>
                </div>
            @endif
            <div>
                <a href="{{ route('logout') }}">Cerrar Sesión</a>
            </div>
        @endif
    </section>
</main>

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
