@extends('layouts.index')
@section('contenido')
    <h3 class="pb-2">
        Editar desparacitación
    </h3>
    <form method="POST" action="{{url('mascotas/'.$mascota_id.'/desparasitaciones/'.$desparasitacion->id)}}" autocomplete="off">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="mb-3">
            <label class="form-label">Veterinaria*</label>
            <select name="veterinaria_id" required class="form-control">
                @foreach($veterinarias as $veterinaria)
                    @if($desparasitacion->veterinaria_id == $veterinaria->id)
                        <option selected value="{{$veterinaria->id}}">{{$veterinaria->nombre}}</option>
                    @else
                        <option value="{{$veterinaria->id}}">{{$veterinaria->nombre}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{$desparasitacion->nombre}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Peso kg</label>
            <input type="number" min="0" step="any" class="form-control" name="peso" value="{{$desparasitacion->peso}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha de desparasitación*</label>
            <input class="form-control" type="date" name="fecha_desparasitacion" value="{{$desparasitacion->fecha_desparasitacion}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Próxima desparasitación</label>
            <input class="form-control" type="date" name="proxima_desparasitacion" value="{{$desparasitacion->proxima_desparasitacion}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Costo Bs.</label>
            <input class="form-control" type="number" name="costo" step="0.01" min="0"  value="{{ $desparasitacion->costo }}">
        </div>
            
        <div style="margin-bottom: 200px"></div>
        <button type="submit" class="float2">
            <i class="fa fa-check fa-2x my-float3"></i>
        </button>
        <a href="{{url('mascotas/'.$mascota_id.'/desparasitaciones')}}" class="float">
            <i class="fa fa-arrow-left fa-2x my-float"></i>
        </a>
    </form>
@endsection
