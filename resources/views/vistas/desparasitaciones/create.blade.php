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
                <div class="mb-3">
                    <label class="form-label">Costo Bs.</label>
                    <input class="form-control" type="number" name="costo" step="0.01" min="0" value="0">
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
