@extends('layouts.index')
@section('contenido')
    <h3 class="pb-2">
        Editar vacunación
    </h3>
    <form method="POST" action="{{url('mascotas/'.$mascota_id.'/vacunaciones/'.$vacunacion->id)}}" autocomplete="off">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="mb-3">
            <label class="form-label">Tipo de Vacuna*</label>
            <input type="text" class="form-control" name="nombre" value="{{$vacunacion->nombre}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" value="{{$vacunacion->detalle}}" name="detalle">
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha Vacunación*</label>
            <input class="form-control" type="date" name="fecha_vacuna" value="{{$vacunacion->fecha_vacuna}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Próxima Vacunación</label>
            <input class="form-control" type="date" name="fecha_validez" value="{{$vacunacion->fecha_validez}}">
        </div>


        <a href="{{url('mascotas/'.$mascota_id.'/vacunaciones')}}" class="btn btn-warning">Atras</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
