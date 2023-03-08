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
        <div class="mb-3">
            <label class="form-label">Costo Bs.</label>
            <input class="form-control" type="number" name="costo" step="0.01" min="0"  value="{{ $operacion->costo }}">
        </div>
        
        <div style="margin-bottom: 200px"></div>
        <button type="submit" class="float2">
            <i class="fa fa-check fa-2x my-float3"></i>
        </button>
        <a href="{{url('mascotas/'.$mascota_id.'/operaciones')}}" class="float">
            <i class="fa fa-arrow-left fa-2x my-float"></i>
        </a>

    </form>
@endsection
