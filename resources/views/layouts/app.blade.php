<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">

    @yield('css')
</head>

<body class="fix-header fix-sidebar">
<!-- Preloader - style you can find in spinners.css') }} -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">
    <!-- header header  -->
    <div class="header">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- Logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="">
                    <!-- Logo icon -->
                    <b><img src="{{ asset('images/logo.png') }}" alt="homepage" class="dark-logo"/></b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span><img src="{{ asset('images/logo-text.png') }}" alt="homepage" class="dark-logo"/></span>
                </a>
            </div>
            <!-- End Logo -->
            <div class="navbar-collapse">
                <!-- toggle and nav items -->
                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted  "
                                            href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
                    <li class="nav-item m-l-10"><a class="nav-link sidebartoggler hidden-sm-down text-muted  "
                                                   href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                </ul>
                <!-- User profile and search -->
                <ul class="navbar-nav my-lg-0">
                    <!-- Profile -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><img src=" {{ asset('images/users/5.jpg') }}"
                                                                           alt="user"
                                                                           class="profile-pic"/></a>
                        <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                            <ul class="dropdown-user">
                                <li><a href="#"><i class="ti-user"></i> {{ Auth::user()->name }}</a></li>
                                <li><a href="#"><i class="ti-pencil"></i> Perfil</a></li>
                                <li><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Salir</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End header header -->
    <!-- Left Sidebar  -->
    <div class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    @if( Auth::user()->user_type == 1)
                    <li><a class="" href="{{ route('comerciantes.listar') }}" aria-expanded="true">
                            <i class="fas fa-list"></i>
                            <span class="">Listado de Códigos</span></a>
                    </li>
                    <li><a class="" href="{{ route('comerciantes.agregar') }}" aria-expanded="false">
                            <i class="fas fa-plus"></i>
                            <span class="">Agregar Códigos</span></a>
                    </li>
                    <li><a class="" href="{{ route('comerciantes.validar') }}" aria-expanded="false">
                            <i class="fas fa-code"></i>
                            <span class="">Validar Código</span></a>
                    </li>
                    <li><a class="" href="{{ route('comerciantes.generar') }}" aria-expanded="false">
                            <i class="fas fa-globe"></i>
                            <span class="">Generar Url</span></a>
                    </li>
                    @else
                    @endif
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </div>
    <!-- End Left Sidebar  -->

    @yield('content')

</div>
<!-- End Wrapper -->

@yield('scripts')
</body>

</html>