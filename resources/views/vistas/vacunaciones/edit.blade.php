@extends('layouts.index')
@section('contenido')
    <h3 class="pb-2">
        Editar vacunacion
    </h3>
    <form method="POST" action="{{url('mascotas/'.$mascota_id.'/vacunaciones/'.$vacunacion->id)}}" autocomplete="off">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{$vacunacion->nombre}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha Vacuna</label>
            <input class="form-control" type="date" name="fecha_vacuna" value="{{$vacunacion->fecha_vacuna}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha Validez</label>
            <input class="form-control" type="date" name="fecha_validez" value="{{$vacunacion->fecha_validez}}"  required>
        </div>
        <div class="mb-3">
            <label class="form-label">Detalle</label>
            <textarea name="detalle" rows="3" class="form-control">{{$vacunacion->detalle}}</textarea>
        </div>

        <a href="{{url('mascotas/'.$mascota_id.'/vacunaciones')}}" class="btn btn-warning">Atras</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
