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
                <label for=""><Correo></Correo></label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="">Telefono</label>
                <input type="text" name="phone" id="phone">
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