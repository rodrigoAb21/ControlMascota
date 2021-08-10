<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('plugins/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('icon.png')}}" type="image/x-icon">
    <title>Control Mascota</title>

    @stack('arriba')
</head>
<body>
<nav class="navbar navbar-light bg-light bg-gradient">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{asset('icon.png')}}" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Control Mascota
        </a>
    </div>
</nav>

<div class="container mt-5">
    <div class="row mb-5 pb-5">
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