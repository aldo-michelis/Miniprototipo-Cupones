<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio | {{ config('app.name') }}</title>
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap-4.0.0.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout-styles-euca.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<!-- body code goes here -->
<!-- contenido general code goes here -->
<main>
    <section class="hd-logo"><span class="extra-logo-sm">eucari</span></section>

<!-- fin de login -->
    <section class="hero">
        <p>
            Un representante de EUCARI se comunicará contigo a la brevedad para completar tu proceso de registro
        </p>
        <p>Gracias!</p>
        <p>&nbsp;</p>
        <img src="images/eucari-logo.png" alt="eucary" width="200" class="img-fluid">
        <p>&nbsp;</p>
    </section>
</main>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-4.0.0.js') }}"></script>
</body>
</html>