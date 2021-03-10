<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{URL::asset('css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{URL::asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{URL::asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{URL::asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{URL::asset('vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{URL::asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{URL::asset('vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{URL::asset('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{URL::asset('vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{URL::asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{URL::asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">


    <!-- Main CSS-->
    <link href="{{URL::asset('css/theme.css')}}" rel="stylesheet" media="all">
    <style>
        .carousel-inner img {
            width: 100%;
            max-height: 460px;
        }

        .carousel-inner {
            height: 400px;
        }

        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #map {
            height: 100%;
        }


        .centrado {
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 80%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{asset('images/icon/logo.jpeg')}}" alt="Cool Admin" style="width: 30%;" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        @if(auth()->check())
                        @if(auth()->user()->hasRol([1]))
                        <li>
                            <a href="{{route('administrarProveedor')}}">
                                <i class="fas fa-copy"></i>Administrar proveedores</a>
                        </li>
                        <li>
                            <a href="{{route('administrarCliente')}}">
                                <i class="fas fa-copy"></i>Administrar clientes</a>
                        </li>
                        <li>
                            <a href="{{route('administrarReportes')}}">
                                <i class="fas fa-copy"></i>Reportes</a>
                        </li>
                        <li>
                            <a href="{{route('administrarProductos')}}">
                                <i class="fas fa-copy"></i>Administrar productos</a>
                        </li>
                        @endif
                        @if(auth()->user()->hasRol([2]))
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-users  "></i>Vendedores</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('mapaProveedor')}}">
                                        <i class="fas fa-map-marker-alt"></i>Ver mapa</a>
                                </li>
                                <li>
                                    <a href="{{route('mejoresCalificados')}}"><i class="fas fa-chart-bar"></i>Mejores calificados</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('misCompras')}}">
                                <i class="fas fa-copy"></i>Mis compras</a>
                        </li>
                        @endif
                        @if(auth()->user()->hasRol([3]))
                        <li>
                            <a href="{{route('paginaProductos')}}">
                                <i class="fas fa-copy"></i>Mis productos</a>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Entregas</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('paginaEntregas')}}">
                                        <i class="fas fa-truck"></i>Mis Entregas</a>
                                </li>
                                <li>
                                    <a href="{{route('paginaEntregasConfirmadas')}}">
                                        <i class="fas fa-map-marker-alt"></i>Mis entregas confirmadas</a>
                                </li>
                            </ul>
                        </li>



                        @endif
                        @endif
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{Auth()->user()->email}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    @if(auth()->user()->hasRol([3]))
                                                    <a href="{{route('paginaProveedor')}}">
                                                        <i class="zmdi zmdi-settings"></i>Configurar</a>
                                                    @endif
                                                    @if(auth()->user()->hasRol([2]))
                                                    <a href="{{route('paginaCliente')}}">
                                                        <i class="zmdi zmdi-settings"></i>Configurar</a>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">

                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="zmdi zmdi-power"></i>
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-25">
                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initialize" async defer></script>
    <!-- Jquery JS-->
    <script src="{{URL::asset('vendor/jquery-3.2.1.min.js')}}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <!-- Bootstrap JS-->
    <script src="{{URL::asset('vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{URL::asset('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{URL::asset('vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{URL::asset('vendor/wow/wow.min.js')}}"></script>
    <script src="{{URL::asset('vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{URL::asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{URL::asset('vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{URL::asset('vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{URL::asset('vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{URL::asset('vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{URL::asset('vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{URL::asset('vendor/select2/select2.min.js')}}">

    </script>

    <!-- Main JS-->
    <script src="{{URL::asset('js/main.js')}}"></script>

    <script>
        $(document).ready(function() {
            $("#cantidad").keyup(function() {
                var precio = document.getElementById("precio").value;
                var cantidad = document.getElementById("cantidad").value;
                var venta_minima = document.getElementById("venta_minima").value;
                total = precio * cantidad;
                $("#total").val(total);
                if ($('#cantidad').val().length == 0 || $('#cantidad').val() < venta_minima) {
                    document.getElementById('comprar').disabled = true;
                } else{
                    document.getElementById('comprar').disabled = false;
                }
            });
        });
    </script>

</body>

</html>
<!-- end document-->