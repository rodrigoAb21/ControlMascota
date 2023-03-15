@extends('layouts.index')
@section('contenido')
<div class="row">
    <div class="col"></div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-header text-center">
                 <h4>Ver consulta</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Veterinaria</label>
                    <input type="text" class="form-control" value="{{$consulta->veterinaria->nombre}}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha de la consulta</label>
                    <input class="form-control" name="fecha_consulta" value="{{Carbon\Carbon::createFromFormat('Y-m-d', $consulta->fecha_consulta)->isoFormat('DD MMMM YYYY')}}" readonly>
            
                </div>
            
                <div class="mb-3">
                    <label class="form-label">Motivo de la consulta</label>
                    <textarea class="form-control" name="motivo" rows="5" readonly>{{$consulta->motivo}}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Diagnóstico</label>
                    <textarea class="form-control" name="diagnostico" rows="5" readonly>{{$consulta->diagnostico}}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha del control</label>
                    <input class="form-control" name="fecha_control" value="{{Carbon\Carbon::createFromFormat('Y-m-d', $consulta->fecha_control)->isoFormat('DD MMMM YYYY')}}"  readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Costo Bs.</label>
                    <input class="form-control" type="number" readonly name="costo" step="0.01" value="{{ $consulta->costo }}">
                </div>
                <hr>
                <h2 class="text-center">Tratamiento</h2> <br>
            
                <div class="container" id="lista">
                    @foreach($consulta->tratamientos as $tratamiento)
                        <div class="mb-3" id="item{{$loop->index}}">
                            <div class="modal-content ">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Medicamento</label>
                                        <input type="text" class="form-control" name="medicamentoT[]" value="{{$tratamiento->medicamento}}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Dosis diaria</label>
                                        <input type="text" class="form-control" name="dosisT[]" value="{{$tratamiento->dosis}}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Cantidad de días</label>
                                        <input type="number" class="form-control" name="cantidad_diasT[]" value="{{$tratamiento->cantidad_dias}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a href="{{url('mascotas/'.$mascota_id.'/consultas')}}" class="float">
                    <i class="fa fa-arrow-left fa-2x my-float"></i>
                </a>
            </div>
        </div>
       
    </div>
    <div class="col"></div>
</div>

    

    
    
@endsection
