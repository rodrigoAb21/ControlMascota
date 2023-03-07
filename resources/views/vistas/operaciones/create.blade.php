@extends('layouts.index')
@section('contenido')
            <h3 class="pb-2">
                Nueva operación
            </h3>
            <form method="POST" action="{{url('mascotas/'.$mascota_id.'/operaciones')}}" autocomplete="off">
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
                    <label class="form-label">Descripción*</label>
                    <input type="text" class="form-control" name="descripcion" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha*</label>
                    <input class="form-control" type="date" name="fecha" value="{{date('Y-m-d')}}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Costo Bs.</label>
                    <input class="form-control" type="number" name="costo" step="0.01" min="0" value="0">
                </div>

                <a href="{{url('mascotas/'.$mascota_id.'/operaciones')}}" class="btn btn-warning">Atrás</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
@endsection
