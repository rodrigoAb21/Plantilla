<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Area de Activos Fijos
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <!-- CSS Files -->
    <link href="{{asset('css/material-dashboard.minf066.css?v=2.1.0')}}" rel="stylesheet" />
</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('img/sidebar-1.jpg')}}">
        <div class="logo">
            <a href="" class="simple-text logo-mini">
            </a>
            <a href="" class="simple-text logo-normal">
                <img style="height: 65px" src="{{asset('img/inegas-logo.png')}}"/>
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="{{asset('img/faces/pusheen.png')}}"/>
                </div>
                <div class="user-info">
                    <a class="username">
                      <span>
                        {{Auth::user()->nombre}}
                      </span>
                    </a>
                </div>
            </div>
            <ul class="nav">
                <li class="{{ Request::is('act/lineas*') ? 'nav-item active' : 'nav-item' }}">
                    <a class="nav-link" href="{{url('act/lineas')}}">
                        <i class="fa fa-tags"></i>
                        <p> Lineas - Grupos </p>
                    </a>
                </li>

                <li class="{{ Request::is('act/estados*') ? 'nav-item active' : 'nav-item' }}">
                    <a class="nav-link" href="{{url('act/estados')}}">
                        <i class="fa fa-file-medical-alt"></i>
                        <p> Estados </p>
                    </a>
                </li>

                <li class="{{ Request::is('act/activos*') ? 'nav-item active' : 'nav-item' }}">
                    <a class="nav-link" href="{{url('act/activos')}}">
                        <i class="fa fa-couch"></i>
                        <p> Activos fijos </p>
                    </a>
                </li>

                <li class="{{ Request::is('act/revaluos*') ? 'nav-item active' : 'nav-item' }}">
                    <a class="nav-link" href="{{url('act/revaluos')}}">
                        <i class="fa fa-file-invoice-dollar"></i>
                        <p> Revaluos </p>
                    </a>
                </li>
                <li class="{{ Request::is('act/ubicaciones*') ? 'nav-item active' : 'nav-item' }}">
                    <a class="nav-link" href="{{url('act/ubicaciones')}}">
                        <i class="fa fa-hotel"></i>
                        <p> Ubicaciones </p>
                    </a>
                </li>

                <li class="{{ Request::is('act/mov-activos*') ? 'nav-item active' : 'nav-item' }}">
                    <a class="{{ Request::is('act/mov-activos*') ? 'nav-link collapse collapsed' : 'nav-link collapse' }}" data-toggle="collapse" href="#mov-sum" aria-expanded="{{ Request::is('act/mov-activos*') ? 'true' : 'false' }}" >
                        <i class="fa fa-people-carry"></i>
                        <p> Mov. Activos Fijos <b class="caret"></b></p>
                    </a>
                    <div class="{{ Request::is('act/mov-activos*') ? 'collapse show' : 'collapse' }}" id="mov-sum">
                        <ul class="nav">
                            <li class="{{ Request::is('act/mov-activos/ingresos*') ? 'nav-item active' : 'nav-item' }}">
                                <a class="nav-link" href="{{url('act/mov-activos/ingresos')}}">
                                    <i class="fa fa-angle-double-right"></i>
                                    <p> Ingresos </p>
                                </a>
                            </li>
                           {{-- <li class="{{ Request::is('act/mov-activos/traslados*') ? 'nav-item active' : 'nav-item' }}">
                                <a class="nav-link" href="{{url('act/mov-activos/traslados')}}">
                                    <i class="fa fa-dolly-flatbed"></i>
                                    <p> Traslados </p>
                                </a>
                            </li>--}}
                            <li class="{{ Request::is('act/mov-activos/asignaciones*') ? 'nav-item active' : 'nav-item' }}">
                                <a class="nav-link" href="{{url('act/mov-activos/asignaciones')}}">
                                    <i class="fa fa-hand-point-right"></i>
                                    <p> Asignaciones </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="{{ Request::is('act/reportes*') ? 'nav-item active' : 'nav-item' }}">
                    <a class="{{ Request::is('act/reportes*') ? 'nav-link collapse collapsed' : 'nav-link collapse' }}" data-toggle="collapse" href="#reportes" aria-expanded="{{ Request::is('act/reportes*') ? 'true' : 'false' }}" >
                        <i class="fa fa-clipboard-list"></i>
                        <p> Reportes <b class="caret"></b></p>
                    </a>
                    <div class="{{ Request::is('act/reportes*') ? 'collapse show' : 'collapse' }}" id="reportes">
                        <ul class="nav">
                            <li class="{{ Request::is('act/reportes/inventario*') ? 'nav-item active' : 'nav-item' }}">
                                <a class="nav-link" href="{{url('act/reportes/inventario')}}">
                                    <i class="fa fa-boxes"></i>
                                    <p> Inventario </p>
                                </a>
                            </li>
                            {{--<li class="{{ Request::is('act/reportes/ingresos*') ? 'nav-item active' : 'nav-item' }}">
                                <a class="nav-link" href="{{url('/act/reportes/ingresos')}}">
                                    <i class="fa fa-angle-double-right"></i>
                                    <p> Ingresos </p>
                                </a>
                            </li>--}}
                         {{--   <li class="{{ Request::is('act/reportes/traslados*') ? 'nav-item active' : 'nav-item' }}">
                                <a class="nav-link" href="{{url('/act/reportes/traslados')}}">
                                    <i class="fa fa-dolly-flatbed"></i>
                                    <p> Traslados </p>
                                </a>
                            </li>--}}
                            <li class="{{ Request::is('act/reportes/asignaciones*') ? 'nav-item active' : 'nav-item' }}">
                                <a class="nav-link" href="{{url('/act/reportes/asignaciones')}}">
                                    <i class="fa fa-hand-point-right"></i>
                                    <p> Asignaciones </p>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>





            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                            <i class="fa fa-ellipsis-v text_align-center visible-on-sidebar-regular"></i>
                            <i class="fa fa-th-list visible-on-sidebar-mini"></i>
                        </button>
                    </div>
                    <a class="navbar-brand" href="{{url('act')}}">Area de Activos Fijos</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <div class="navbar-form" hidden></div>
                    <ul class="navbar-nav">
                        {{--<li class="nav-item">
                            <a class="nav-link" href="{{url('config/tema')}}">
                                <i class="fa fa-palette"></i>
                                <p class="d-lg-none d-md-block">
                                    Cambiar tema
                                </p>
                            </a>
                        </li>--}}
                        @if(Auth::user()->area == 'Activos Fijos - Suministros')
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('sum')}}">
                                    <i class="fa fa-exchange-alt"></i>
                                    <p class="d-lg-none d-md-block">
                                        Cambiar vista
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('seg')}}">
                                    <i class="fa fa-user-shield"></i>
                                    <p class="d-lg-none d-md-block">
                                        Seguridad
                                    </p>
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out-alt"></i>
                                <p class="d-lg-none d-md-block">
                                    Cerrar Sesion
                                </p>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>
</div>
<!--   Core JS Files   -->
<script src="{{asset('js/core/jquery.min.js')}}"></script>
<script src="{{asset('js/core/popper.min.js')}}"></script>
<script src="{{asset('js/core/bootstrap-material-design.min.js')}}"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{asset('js/plugins/bootstrap-selectpicker.js')}}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('js/plugins/jasny-bootstrap.min.js')}}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-dashboard.minf066.js?v=2.1.0')}}" type="text/javascript"></script>
<script src="{{asset('js/validador.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                    $('.fixed-plugin .dropdown').addClass('open');
                }

            }

            $('.fixed-plugin a').click(function(event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .background-color .badge').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').change(function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function() {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function() {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });
        });
    });
</script>
@stack('scripts')
</body>
</html>