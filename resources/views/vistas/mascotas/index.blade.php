@extends('layouts.index')
@section('contenido')
    <h2><i class="fa fa-paw"></i> Mis mascotas</h2>
    @foreach($mascotas as $mascota)
        <div class="card mb-3 mx-auto bg-gradient" style="max-width: 600px; background-color: #19317b; border-radius: 10px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <h2 class="card-title" style="color: #91d5f1">{{$mascota->nombre}}</h2>
                        <span class="card-text" style="color: #c7c7c7"><i class="fa fa-paw me-1"></i> {{$mascota->tipo}}</span><br>
                        <span class="card-text" style="color: #c7c7c7"><i class="fa fa-birthday-cake me-1"></i> {{date_format(date_create($mascota->fecha_nac), 'd-M-Y')}}</span><br>
                        <span class="card-text" style="color: #c7c7c7"><i class="fas fa-venus-mars me-1"></i> {{$mascota->sexo}}</span><br>

                        <div class="text-end">
                            <a href="{{url('mascotas/'.$mascota->id)}}" class="btn btn-light"><i class="fa fa-eye"></i></a>
                            <a href="{{url('mascotas/'.$mascota->id.'/edit')}}" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                            <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$mascota -> nombre}}', '{{url('mascotas/'.$mascota -> id)}}')">
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

    <a href="{{url('mascotas/create')}}" class="float2">
        <i class="fa fa-plus fa-2x my-float2"></i>
    </a>
    <a href="{{url('/')}}" class="float">
        <i class="fa fa-arrow-left fa-2x my-float"></i>
    </a>

    @include('vistas.modal')
    @push('scripts')
        <script>
            function modalEliminar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar Mascota");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar la mascota: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }
        </script>
    @endpush()

@endsection
