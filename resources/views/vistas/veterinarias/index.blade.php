@extends('layouts.index')
@section('contenido')
    <h2><i class="fa fa-clinic-medical"></i> Veterinarias</h2>
    @foreach($veterinarias as $veterinaria)
        <div class="card mb-3 mx-auto bg-gradient" style="max-width: 600px; background-color: #19317b; border-radius: 10px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-11">
                        <h2 class="card-title" style="color: #91d5f1">{{$veterinaria->nombre}}</h2>

                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7"><i class="fa fa-phone me-1"></i> {{$veterinaria->celular}} - {{$veterinaria->telefono}}</span>
                        </div>
                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7"><i class="fa fa-map-marked-alt me-1"></i> {{$veterinaria->direccion}}</span>
                        </div>
                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7"><i class="fa fa-history me-1"></i> {{$veterinaria->atencion}}</span>
                        </div>

                        <div class="text-end">
                            <a href="{{url('veterinarias/'.$veterinaria->id.'/edit')}}" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                            <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$veterinaria -> nombre}}', '{{url('veterinarias/'.$veterinaria -> id)}}')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
    <a href="{{url('veterinarias/create')}}" class="float2">
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
                $('#modalEliminarTitulo').html("Eliminar veterinaria");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar la veterinaria: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }
        </script>
    @endpush()

@endsection
