@extends('layouts.index')
@section('contenido')
            <h3 class="pb-2">
                Nueva mascota
            </h3>
            <form method="POST" action="{{url('mascotas')}}" autocomplete="off">
                {{csrf_field()}}
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nacimiento</label>
                    <input type="date" class="form-control" name="fecha_nac" value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo</label>
                    <select class="form-control" name="tipo" required>
                        @foreach($tipos as $tipo)
                            <option value="{{$tipo}}">{{$tipo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Sexo</label>
                    <br>
                    <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="sexo" value="Macho" checked>
                       <label class="form-check-label" for="flexRadioDefault1">
                           Macho
                       </label>
                   </div>
                    <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="sexo" value="Hembra">
                       <label class="form-check-label" for="flexRadioDefault2">
                           Hembra
                       </label>
                   </div>
               </div>
                <a href="{{url('mascotas')}}" class="btn btn-warning">Atras</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
@endsection
