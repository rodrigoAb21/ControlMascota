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
                 <h4>Editar veterinaria</h4>
            </div>
            <div class="card-body">
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
                        <input class="form-control" value="{{$veterinaria->telefono}}" type="number" max="79999999" name="telefono">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular</label>
                        <input class="form-control" value="{{$veterinaria->celular}}" type="number" max="79999999" name="celular">
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label">Atención</label>
                        <br>
                        @if($veterinaria->atencion == '24hrs')
            
                            <div class="form-check form-check-inline">
                                <input  id="r1" class="form-check-input" type="radio" name="atencion" value="Normal">
                                <label class="form-check-label" for="r1">
                                    Normal
                                </label>
                            </div>
            
                            <div class="form-check form-check-inline">
                                <input  id="r2" class="form-check-input" type="radio" name="atencion" value="24hrs" checked>
                                <label class="form-check-label" for="r2">
                                    24hrs
                                </label>
                            </div>
                        @else
            
                            <div class="form-check form-check-inline">
                                <input  id="r1" class="form-check-input" type="radio" name="atencion" value="Normal" checked>
                                <label class="form-check-label" for="r1">
                                    Normal
                                </label>
                            </div>
            
                            <div class="form-check form-check-inline">
                                <input  id="r2" class="form-check-input" type="radio" name="atencion" value="24hrs">
                                <label class="form-check-label" for="r2">
                                    24hrs
                                </label>
                            </div>
                        @endif
            
                    </div>
            
                    <button type="submit" class="float2">
                        <i class="fa fa-check fa-2x my-float3"></i>
                    </button>
                    <a href="{{url('veterinarias')}}" class="float">
                        <i class="fa fa-arrow-left fa-2x my-float"></i>
                    </a>
                </form>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>
    
@endsection
