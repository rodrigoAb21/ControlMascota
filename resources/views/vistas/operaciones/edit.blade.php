@extends('layouts.index')
@section('contenido')
    <h3 class="pb-2">
        Editar operación
    </h3>
    <form method="POST" action="{{url('mascotas/'.$mascota_id.'/operaciones/'.$operacion->id)}}" autocomplete="off">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="mb-3">
            <label class="form-label">Veterinaria*</label>
            <select name="veterinaria_id" required class="form-control">
                @foreach($veterinarias as $veterinaria)
                    @if($operacion->veterinaria_id == $veterinaria->id)
                        <option selected value="{{$veterinaria->id}}">{{$veterinaria->nombre}}</option>
                    @else
                        <option value="{{$veterinaria->id}}">{{$veterinaria->nombre}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción*</label>
            <input type="text" class="form-control" name="descripcion" value="{{$operacion->descripcion}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha*</label>
            <input class="form-control" type="date" name="fecha" value="{{$operacion->fecha}}" required>
        </div>

        <a href="{{url('mascotas/'.$mascota_id.'/operaciones')}}" class="btn btn-warning">Atrás</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
