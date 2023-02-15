@extends('layouts.index')
@section('contenido')
            <h3 class="pb-2">
                Nueva desparasitación
            </h3>
            <form method="POST" action="{{url('mascotas/'.$mascota_id.'/desparasitaciones')}}" autocomplete="off">
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
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="mb-3">
                    <label class="form-label">Peso kg</label>
                    <input type="number" step="any" min="0" class="form-control" name="peso">
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha de desparasitación*</label>
                    <input class="form-control" type="date" name="fecha_desparasitacion" value="{{date('Y-m-d')}}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Próxima desparasitación</label>
                    <input class="form-control" type="date" name="proxima_desparasitacion" value="{{date('Y-m-d')}}">
                </div>

                <a href="{{url('mascotas/'.$mascota_id.'/desparasitaciones')}}" class="btn btn-warning">Atrás</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
@endsection
