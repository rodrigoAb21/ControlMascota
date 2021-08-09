@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            @foreach($mascotas as $mascota)
                <div class="card mb-3 mx-auto bg-gradient" style="max-width: 600px; background-color: #19317b;">
                    <div class="card-body">
                       <div class="row">
                           <div class="col-2">
                           </div>
                           <div class="col-10">
                               <h2 class="card-title" style="color: #91d5f1">{{$mascota->nombre}}</h2>
                               <span class="card-text" style="color: #c7c7c7"><i class="fa fa-paw me-1"></i> {{$mascota->tipo}}</span><br>
                               <span class="card-text" style="color: #c7c7c7"><i class="fa fa-birthday-cake me-1"></i> {{$mascota->fecha_nac}}</span><br>
                               <span class="card-text" style="color: #c7c7c7"><i class="fas fa-venus-mars me-1"></i> {{$mascota->sexo}}</span><br>

                               <div class="text-end">
                                   <a href="#" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                                   <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection