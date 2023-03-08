@extends('layouts.index')
@section('contenido')
    <h2><i class="fa fa-procedures"></i> Operaciones de "{{$mascota->nombre}}"</h2>
    @foreach($operaciones as $operacion)
        <div class="card mb-3 mx-auto bg-gradient" style="max-width: 600px; background-color: #19317b; border-radius: 10px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-11">
                        <h2 class="card-title" style="color: #91d5f1">{{$operacion->descripcion}}</h2>
                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7"><i class="fa fa-clinic-medical me-1"></i> Vet. {{$operacion->veterinaria->nombre}}</span>
                        </div>
                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7"><i class="fa fa-calendar-check me-1"></i> {{Carbon\Carbon::createFromFormat('Y-m-d', $operacion->fecha)->isoFormat('DD MMMM YYYY')}}</span>
                        </div>
                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7">
                                <i class="fa fa-coins"></i> Bs. {{$operacion->costo}} 
                            </span><br>
                        </div>

                        <div class="text-end">
                            <a href="{{url('mascotas/'.$mascota->id.'/operaciones/'.$operacion->id.'/edit')}}" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                            <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$operacion -> nombre}}', '{{url('mascotas/'.$mascota->id.'/operaciones/'.$operacion -> id)}}')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div style="margin-bottom: 200px"></div>
    <a href="{{url('mascotas/'.$mascota->id.'/operaciones/create')}}" class="float2">
        <i class="fa fa-plus fa-2x my-float2"></i>
    </a>
    <a href="{{url('mascotas/'.$mascota->id)}}" class="float">
        <i class="fa fa-arrow-left fa-2x my-float"></i>
    </a>

    @include('vistas.modal')
    @push('scripts')
        <script>
            function modalEliminar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar operacion");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar la operacion: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }
        </script>
    @endpush()

@endsection
