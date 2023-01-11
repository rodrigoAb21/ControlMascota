@extends('layouts.index')
@section('contenido')
            <h3 class="pb-2">
                Nueva vacunación
            </h3>
            <form method="POST" action="{{url('mascotas/'.$mascota_id.'/vacunaciones')}}" autocomplete="off">
                {{csrf_field()}}
                <div class="mb-3">
                    <label class="form-label">Veterinaria*</label>
                    <select name="veterinaria_id" class="form-control" required>
                        @foreach($veterinarias as $veterinaria)
                            <option value="{{$veterinaria->id}}">{{$veterinaria->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo de Vacuna*</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="detalle">
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha de Vacunación*</label>
                    <input class="form-control" type="date" name="fecha_vacuna" value="{{date('Y-m-d')}}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Próxima Vacunación</label>
                    <input class="form-control" type="date" name="fecha_validez" value="{{date('Y-m-d')}}">
                </div>


                <a href="{{url('mascotas/'.$mascota_id.'/vacunaciones')}}" class="btn btn-warning">Atrás</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
@endsection
