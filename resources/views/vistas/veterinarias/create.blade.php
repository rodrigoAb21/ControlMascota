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
                <div class="mb-3">
                    <label class="form-label">Atención</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input id="r1" class="form-check-input" type="radio" name="horas" value="Normal" checked>
                        <label class="form-check-label" for="r1">
                            Normal
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input id="r2" class="form-check-input" type="radio" name="horas" value="24hrs" >
                        <label class="form-check-label" for="r2">
                            24hrs
                        </label>
                    </div>

                </div>

                <a href="{{url('veterinarias')}}" class="btn btn-warning">Atrás</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
@endsection
