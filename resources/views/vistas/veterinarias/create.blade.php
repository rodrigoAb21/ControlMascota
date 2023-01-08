@extends('layouts.index')
@section('contenido')
            <h3 class="pb-2">
                Nueva veterinaria
            </h3>
            <form method="POST" action="{{url('veterinarias')}}" autocomplete="off">
                {{csrf_field()}}
                <div class="mb-3">
                    <label class="form-label">Nombre*</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Dirección</label>
                    <textarea class="form-control" name="direccion" cols="30" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input class="form-control" type="number" max="79999999" name="telefono1">
                </div>
                <div class="mb-3">
                    <label class="form-label">Celular</label>
                    <input class="form-control" type="number" max="79999999" name="telefono2">
                </div>

                <a href="{{url('veterinarias')}}" class="btn btn-warning">Atras</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
@endsection
