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
    <section class="hd-logo"><span class="extra-logo-sm">eucari</span></section>
    @include('layouts.errors')
</header>

<main>
    @if( isset($coupon))
    <img height="100px" src="{{ asset(Storage::url($coupon->user->merchantImage())) }}" alt="">
    @endif
    <h1>Registro de cliente</h1>
    <section class="reg-cliente">
        <form action="{{ route('clientes.registrar') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" id="user_type" name="user_type" value="2">
            @if( isset($coupon))
                <input type="hidden" id="coupon_id" name="coupon_id" value="{{ $coupon->id }}">
            @endif
            <div>
                <label for="username">Correo</label>
                <input type="email" name="username" id="username" required>
            </div>
            <div>
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="password_confirm">Confirmar Contraseña</label>
                <input type="password" name="password_confirm" id="password_confirm" required>
            </div>
            <input type="submit" value="Registrar">
        </form>
    </section>
    <p>&nbsp;</p>
</main>

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
