@extends('layouts.index')
@section('contenido')
<div class="row">
    <div class="col"></div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card">
            <div class="card-header text-center">
                 <h4>Editar mascota</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{url('mascotas/'.$mascota->id)}}" autocomplete="off">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="mb-3">
                        <label class="form-label">Nombre*</label>
                        <input type="text" class="form-control" name="nombre" value="{{$mascota->nombre}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de nacimiento*</label>
                        <input type="date" class="form-control" name="fecha_nac" value="{{$mascota->fecha_nac}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo*</label>
                        <select class="form-control" name="tipo" required>
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
                        <label class="form-label">Sexo*</label>
                        <br>
                        @if($mascota->sexo == 'Macho')
                            <div class="form-check form-check-inline">
                                <input id="r1" class="form-check-input" type="radio" name="sexo" value="Macho" checked>
                                <label class="form-check-label" for="r1">
                                    Macho
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input id="r2" class="form-check-input" type="radio" name="sexo" value="Hembra">
                                <label class="form-check-label" for="r2">
                                    Hembra
                                </label>
                            </div>
                        @else
                            <div class="form-check form-check-inline">
                                <input id="r1" class="form-check-input" type="radio" name="sexo" value="Macho">
                                <label class="form-check-label" for="r1">
                                    Macho
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input id="r2" class="form-check-input" type="radio" name="sexo" value="Hembra" checked>
                                <label class="form-check-label" for="r2">
                                    Hembra
                                </label>
                            </div>
                        @endif
            
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label">Raza</label>
                        <input type="text" class="form-control" name="raza" value="{{$mascota->raza}}">
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label">Color</label>
                        <input type="text" class="form-control" name="color" value="{{$mascota->color}}">
                    </div>
                             
                    <button type="submit" class="float2">
                        <i class="fa fa-check fa-2x my-float3"></i>
                    </button>
                    <a href="{{url('mascotas')}}" class="float">
                        <i class="fa fa-arrow-left fa-2x my-float"></i>
                    </a>
                </form>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>
   
    
@endsection
