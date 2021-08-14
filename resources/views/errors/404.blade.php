<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Bootstrap CSS -->
    <link href="{{asset('plugins/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('icon.png')}}"/>
    <title>Control Mascota</title>
    <style>
        body{
            margin-top: 150px;
            background-color: #C4CCD9;
        }
        .error-main{
            background-color: #fff;
            box-shadow: 0px 10px 10px -10px #5D6572;
        }
        .error-main h1{
            font-weight: bold;
            color: #444444;
            font-size: 100px;
            text-shadow: 2px 4px 5px #6E6E6E;
        }
        .error-main h6{
            color: #42494F;
        }
        .error-main p{
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row text-center">
        <div class="col-lg-6 offset-lg-3 col-sm-6 offset-sm-3 col-12 p-3 error-main">
            <div class="row">
                <div class="col-lg-8 col-12 col-sm-10 offset-lg-2 offset-sm-1">
                    <h1 class="m-0">404</h1>
                    <h3>Página no encontrada</h3>
                    <p><a href="{{url('/')}}" class="btn btn-danger">Volver al Inicio</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>