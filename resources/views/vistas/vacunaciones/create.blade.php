@extends('layouts.index')
@section('contenido')
            <h3 class="pb-2">
                Nueva vacunacion
            </h3>
            <form method="POST" action="{{url('mascotas/'.$mascota_id.'/vacunaciones')}}" autocomplete="off">
                {{csrf_field()}}
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha Vacuna</label>
                    <input class="form-control" type="date" name="fecha_vacuna" value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha Validez</label>
                    <input class="form-control" type="date" name="fecha_validez" value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Detalle</label>
                    <textarea name="detalle" rows="3" class="form-control"></textarea>
                </div>

                <a href="{{url('mascotas/'.$mascota_id.'/vacunaciones')}}" class="btn btn-warning">Atras</a>
                <button type="Guardar" class="btn btn-primary">Guardar</button>
            </form>
@endsection
