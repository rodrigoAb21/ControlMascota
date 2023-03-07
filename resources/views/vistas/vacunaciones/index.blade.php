@extends('layouts.index')
@section('contenido')
    <h2><i class="fa fa-syringe"></i> Vacunaciones de "{{$mascota->nombre}}"</h2>
    @foreach($vacunaciones as $vacunacion)
        <div class="card mb-3 mx-auto bg-gradient" style="max-width: 600px; background-color: #19317b; border-radius: 10px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-11">
                        <h2 class="card-title" style="color: #91d5f1">{{$vacunacion->tipo_vacuna}}</h2>
                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7">
                                <i class="fa fa-clinic-medical me-1"></i> Vet. {{$vacunacion->veterinaria->nombre}}
                            </span>
                        </div>
                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7">
                                <i class="fa fa-vial me-1"></i> {{$vacunacion->nombre}}
                            </span>
                        </div>
                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7">
                                <i class="fa fa-coins"></i> Bs. {{$vacunacion->costo}} 
                            </span><br>
                        </div>
                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7">
                                <i class="fa fa-calendar-day me-1"></i>
                                {{Carbon\Carbon::createFromFormat('Y-m-d', $vacunacion->fecha_vacunacion)
                                ->isoFormat('DD MMMM YYYY')}} ---
                                {{Carbon\Carbon::createFromFormat('Y-m-d', $vacunacion->proxima_vacunacion)
                                ->isoFormat('DD MMMM YYYY')}}
                            </span>
                        </div>

                        <div class="text-end">
                            <a
                                href="{{url('mascotas/'.$mascota->id.'/vacunaciones/'.$vacunacion->id.'/edit')}}"
                                class="btn btn-warning"><i class="fa fa-pen"></i>
                            </a>
                            <button type="button" class="btn btn-danger"
                                    onclick="modalEliminar(
                                        '{{$vacunacion -> tipo_vacuna}}',
                                        '{{url('mascotas/'.$mascota->id.'/vacunaciones/'.$vacunacion -> id)}}'
                                        )">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div style="margin-bottom: 200px"></div>
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
            .float2{
                position:fixed;
                width:60px;
                height:60px;
                bottom:110px;
                right:40px;
                background-color: #0085cc;
                color:#FFF;
                border-radius:50px;
                text-align:center;
                box-shadow: 2px 2px 3px #999;
            }

            .my-float2{
                margin-top:14px;
            }

            a.float2:hover{
                visibility: visible;
                opacity: 1;
                color: #f0f0f0;
            }

        </style>
    @endpush

    <a href="{{url('mascotas/'.$mascota->id.'/vacunaciones/create')}}" class="float2">
        <i class="fa fa-plus fa-2x my-float2"></i>
    </a>
    <a href="{{url('mascotas/'.$mascota->id)}}" class="float">
        <i class="fa fa-arrow-left fa-2x my-float"></i>
    </a>

    @include('vistas.modal')
    @push('scripts')
        <script>
            function modalEliminar(tipo_vacuna, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar vacunacion");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar la vacunacion: " + tipo_vacuna + "?");
                $('#modalEliminar').modal('show');
            }
        </script>
    @endpush()

@endsection
