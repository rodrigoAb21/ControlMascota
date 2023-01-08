@extends('layouts.index')
@section('contenido')
    <h3 class="pb-2">
        Ver consulta
    </h3>
        <div class="mb-3">
            <label class="form-label">Veterinaria</label>
            <input type="text" class="form-control" value="{{$consulta->veterinaria->nombre}}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha de la consulta</label>
            <input class="form-control" name="fecha_consulta" value="{{Carbon\Carbon::createFromFormat('Y-m-d', $consulta->fecha_consulta)->isoFormat('DD MMMM YYYY')}}" readonly>

        </div>
        <div class="mb-3">
            <label class="form-label">Fecha del control</label>
            <input class="form-control" name="fecha_control" value="{{Carbon\Carbon::createFromFormat('Y-m-d', $consulta->fecha_control)->isoFormat('DD MMMM YYYY')}}"  readonly>

        </div>
        <div class="mb-3">
            <label class="form-label">Sintomas</label>
            <textarea class="form-control" name="sintomas" rows="5" readonly>{{$consulta->sintomas}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Diagnostico</label>
            <textarea class="form-control" name="diagnostico" rows="5" readonly>{{$consulta->diagnostico}}</textarea>
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
                                <label class="form-label">Dosis</label>
                                <input type="text" class="form-control" name="dosisT[]" value="{{$tratamiento->dosis}}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cantidad dias</label>
                                <input type="number" class="form-control" name="cantidad_diasT[]" value="{{$tratamiento->cantidad_dias}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{url('mascotas/'.$mascota_id.'/consultas')}}" class="btn btn-warning">Atras</a>

    <div class="mb-3"></div>
@endsection
