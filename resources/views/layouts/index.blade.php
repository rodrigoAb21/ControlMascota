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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{asset('icon.png')}}" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Control Veterinario
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if (!\Auth::guest())
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a  class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarDropdownMenuLink"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

                            {{\Auth::user()->nombre }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="{{url('editar')}}">
                                    <i class="fa fa-user-cog"></i> Editar Usuario
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="dropdown-item">
                                    <i class="fa fa-power-off"></i>
                                    Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        @endif
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
