@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col"></div>
        <div class="col-md-6 col-xs-12 col-sm-12">
            <div class="wrimagecard wrimagecard-topimage text-center">
                <a href="{{url('mascotas')}}">
                    <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
                        <i class="fa fa-paw" style="color:#BB7824"></i>
                    </div>
                    <div class="wrimagecard-topimage_title ">
                        <h4>MASCOTAS</h4>
                    </div>
                </a>
            </div>
            <br>
            <div class="wrimagecard wrimagecard-topimage text-center ">
                <a href="{{url('veterinarias')}}">
                    <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
                        <i class="fa fa-clinic-medical" style="color:#BB7824"></i>
                    </div>
                    <div class="wrimagecard-topimage_title ">
                        <h4>VETERINARIAS</h4>
                    </div>
                </a>
            </div>
        </div>
        <div class="col"></div>
    </div>
@endsection

