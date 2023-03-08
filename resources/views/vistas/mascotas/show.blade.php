@extends('layouts.index')

@section('contenido')
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
    
    <a href="{{url('mascotas')}}" class="float">
        <i class="fa fa-arrow-left fa-2x my-float"></i>
    </a>
@endsection

