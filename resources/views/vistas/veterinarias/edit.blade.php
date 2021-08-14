@extends('layouts.index')
@section('contenido')
    <h3 class="pb-2">
        Editar veterinaria
    </h3>
    <form method="POST" action="{{url('veterinarias/'.$veterinaria->id)}}" autocomplete="off">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" value="{{$veterinaria->nombre}}" name="nombre" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Direccion</label>
            <textarea class="form-control" name="direccion" cols="30" rows="3">{{$veterinaria->direccion}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Telefono</label>
            <input class="form-control" value="{{$veterinaria->telefono1}}" type="number" max="79999999" name="telefono1">
        </div>
        <div class="mb-3">
            <label class="form-label">Celular</label>
            <input class="form-control" value="{{$veterinaria->telefono2}}" type="number" max="79999999" name="telefono2">
        </div>

        <a href="{{url('veterinarias')}}" class="btn btn-warning">Atras</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
