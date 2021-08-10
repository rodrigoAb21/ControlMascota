@extends('layouts.index')
@section('contenido')
    <h3 class="pb-2">
        Editar mascota
    </h3>
    <form method="POST" action="{{url('mascotas/'.$mascota->id)}}" autocomplete="off">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{$mascota->nombre}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nacimiento</label>
            <input type="date" class="form-control" name="fecha_nac"  value="{{$mascota->fecha_nac}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo</label>
            <select class="form-control" name="tipo">
                @foreach($tipos as $tipo)
                    @if($mascota->tipo == $tipo)
                        <option selected value="{{$tipo}}">{{$tipo}}</option>
                    @else
                        <option value="{{$tipo}}">{{$tipo}}</option>
                    @endif

                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Sexo</label>
            <br>
            @if($mascota->sexo == 'M')
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" value="M" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Macho
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" value="H">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Hembra
                    </label>
                </div>
            @else
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" value="M">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Macho
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" value="H" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Hembra
                    </label>
                </div>
            @endif

        </div>
        <a href="{{url('mascotas')}}" class="btn btn-warning">Atras</a>
        <button type="Guardar" class="btn btn-primary">Guardar</button>
    </form>
@endsection
