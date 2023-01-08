@extends('layouts.index')

@section('contenido')
    @push('arriba')
        <style>
            .wrimagecard{
                margin-top: 0;
                margin-bottom: 1.5rem;
                text-align: left;
                position: relative;
                background: #fff;
                box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);
                border-radius: 10px;
                transition: all 0.3s ease;
            }
            .wrimagecard .fa{
                position: relative;
                font-size: 70px;
            }
            .wrimagecard-topimage_header{
                padding: 20px;
                border-radius:  10px 10px 0px 0px;
            }
            a.wrimagecard:hover, .wrimagecard-topimage:hover {
                box-shadow: 2px 4px 8px 0px rgba(46,61,73,0.2);
            }
            .wrimagecard-topimage a {
                width: 100%;
                height: 100%;
                display: block;
            }
            .wrimagecard-topimage_title {
                padding: 20px 24px;
                height: 80px;
                padding-bottom: 0.75rem;
                position: relative;
            }
            .wrimagecard-topimage a {
                border-bottom: none;
                text-decoration: none;
                color: #525c65;
                transition: color 0.3s ease;
            }
        </style>
    @endpush
    <div class="row">
        <h2>Registro de "{{$mascota->nombre}}"</h2><br>
        <div class="col-12">
            <div class="wrimagecard wrimagecard-topimage text-center">
                <a href="{{url('mascotas/'.$mascota->id.'/consultas')}}">
                    <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
                        <i class="fa fa-stethoscope" style="color:#BB7824"></i>
                    </div>
                    <div class="wrimagecard-topimage_title ">
                        <h4>CONSULTAS</h4>
                    </div>
                </a>
            </div>
            <br>
            <div class="wrimagecard wrimagecard-topimage text-center ">
                <a href="{{url('mascotas/'.$mascota->id.'/vacunaciones')}}">
                    <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
                        <i class="fa fa-syringe" style="color:#BB7824"></i>
                    </div>
                    <div class="wrimagecard-topimage_title ">
                        <h4>VACUNACIONES</h4>
                    </div>
                </a>
            </div>
            <br>
            <div class="wrimagecard wrimagecard-topimage text-center ">
                <a href="{{url('mascotas/'.$mascota->id.'/desparasitaciones')}}">
                    <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
                        <i class="fa fa-bacteria" style="color:#BB7824"></i>
                    </div>
                    <div class="wrimagecard-topimage_title ">
                        <h4>DESPARASITACIONES</h4>
                    </div>
                </a>
            </div>
            <br>
            <div class="wrimagecard wrimagecard-topimage text-center ">
                <a href="{{url('mascotas/'.$mascota->id.'/operaciones')}}">
                    <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
                        <i class="fa fa-procedures" style="color:#BB7824"></i>
                    </div>
                    <div class="wrimagecard-topimage_title ">
                        <h4>OPERACIONES</h4>
                    </div>
                </a>
            </div>
        </div>

    </div>
    @push('arriba')
        <style>
            *{padding:0;margin:0;}

            .float{
                position:fixed;
                width:60px;
                height:60px;
                bottom:40px;
                right:40px;
                background-color: #FBC02D;
                color: #ffffff;
                border-radius:50px;
                text-align:center;
                box-shadow: 2px 2px 3px #999;
            }

            .my-float{
                margin-top:14px;
            }

            a.float:hover{
                visibility: visible;
                opacity: 1;
                color: #f0f0f0;
            }

        </style>
    @endpush

    <a href="{{url('mascotas')}}" class="float">
        <i class="fa fa-arrow-left fa-2x my-float"></i>
    </a>
@endsection

