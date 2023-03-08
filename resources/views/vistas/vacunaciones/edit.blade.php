@extends('layouts.index')
@section('contenido')
    <h3 class="pb-2">
        Editar vacunación
    </h3>
    <form method="POST" action="{{url('mascotas/'.$mascota_id.'/vacunaciones/'.$vacunacion->id)}}" autocomplete="off">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="mb-3">
            <label class="form-label">Veterinaria*</label>
            <select name="veterinaria_id" required class="form-control">
                @foreach($veterinarias as $veterinaria)
                    @if($vacunacion->veterinaria_id == $veterinaria->id)
                        <option selected value="{{$veterinaria->id}}">{{$veterinaria->nombre}}</option>
                    @else
                        <option value="{{$veterinaria->id}}">{{$veterinaria->nombre}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo de Vacuna*</label>
            <input type="text" class="form-control" name="tipo_vacuna" value="{{$vacunacion->tipo_vacuna}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" value="{{$vacunacion->nombre}}" name="nombre">
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha Vacunación*</label>
            <input class="form-control" type="date" name="fecha_vacunacion" value="{{$vacunacion->fecha_vacunacion}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Próxima Vacunación</label>
            <input class="form-control" type="date" name="proxima_vacunacion" value="{{$vacunacion->proxima_vacunacion}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Costo Bs.</label>
            <input class="form-control" type="number" min="0" name="costo" step="0.01" value="{{ $vacunacion->costo }}">
        </div>

         
        <div style="margin-bottom: 200px"></div>
        <button type="submit" class="float2">
            <i class="fa fa-check fa-2x my-float3"></i>
        </button>
        <a href="{{url('mascotas/'.$mascota_id.'/vacunaciones')}}" class="float">
            <i class="fa fa-arrow-left fa-2x my-float"></i>
        </a>
    </form>
@endsection
