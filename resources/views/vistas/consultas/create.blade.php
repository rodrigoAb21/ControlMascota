@extends('layouts.index')
@section('contenido')
            <h3 class="pb-2">
                Nueva operacion
            </h3>
            <form method="POST" action="{{url('mascotas/'.$mascota_id.'/operaciones')}}" autocomplete="off">
                {{csrf_field()}}
                <div class="mb-3">
                    <label class="form-label">Descripcion</label>
                    <input type="text" class="form-control" name="descripcion" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha</label>
                    <input class="form-control" type="date" name="fecha" value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}" required>
                </div>

                <a href="{{url('mascotas/'.$mascota_id.'/operaciones')}}" class="btn btn-warning">Atras</a>
                <button type="Guardar" class="btn btn-primary">Guardar</button>
            </form>
@endsection
