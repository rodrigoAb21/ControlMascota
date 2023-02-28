<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('plugins/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('icon.png')}}"/>
    <title>Control Veterinario</title>

    @stack('arriba')
</head>
<body>
<nav class="navbar navbar-light bg-light bg-gradient">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{asset('icon.png')}}" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Control Veterinario
        </a>
    </div>
    <div class="navbar-collapse">

        <ul class="navbar-nav my-lg-0">

            @if (!\Auth::guest())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{\Auth::user()->nombre }} {{\Auth::user()->apellido }}</a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="cerrar">
                                    <i class="fa fa-power-off"></i>
                                    Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>

<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            @yield('contenido')
        </div>
    </div>
</div>

<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
@stack('scripts')
</body>
</html>
