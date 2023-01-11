@extends('layouts.index')
@section('contenido')
    <h3 class="pb-2">
        Editar veterinaria
    </h3>
    <form method="POST" action="{{url('veterinarias/'.$veterinaria->id)}}" autocomplete="off">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="mb-3">
            <label class="form-label">Nombre*</label>
            <input type="text" class="form-control" value="{{$veterinaria->nombre}}" name="nombre" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Dirección</label>
            <textarea class="form-control" name="direccion" cols="30" rows="3">{{$veterinaria->direccion}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Teléfono</label>
            <input class="form-control" value="{{$veterinaria->telefono1}}" type="number" max="79999999" name="telefono1">
        </div>
        <div class="mb-3">
            <label class="form-label">Celular</label>
            <input class="form-control" value="{{$veterinaria->telefono2}}" type="number" max="79999999" name="telefono2">
        </div>

        <div class="mb-3">
            <label class="form-label">Atención</label>
            <br>
            @if($veterinaria->horas == '24hrs')

                <div class="form-check form-check-inline">
                    <input  id="r1" class="form-check-input" type="radio" name="horas" value="Normal">
                    <label class="form-check-label" for="r1">
                        Normal
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <input  id="r2" class="form-check-input" type="radio" name="horas" value="24hrs" checked>
                    <label class="form-check-label" for="r2">
                        24hrs
                    </label>
                </div>
            @else

                <div class="form-check form-check-inline">
                    <input  id="r1" class="form-check-input" type="radio" name="horas" value="Normal" checked>
                    <label class="form-check-label" for="r1">
                        Normal
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <input  id="r2" class="form-check-input" type="radio" name="horas" value="24hrs">
                    <label class="form-check-label" for="r2">
                        24hrs
                    </label>
                </div>
            @endif

        </div>
        <a href="{{url('veterinarias')}}" class="btn btn-warning">Atrás</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
