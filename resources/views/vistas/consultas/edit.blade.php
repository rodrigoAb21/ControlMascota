@extends('layouts.index')
@section('contenido')
    <h3 class="pb-2">
        Editar consulta
    </h3>
    <form method="POST" action="{{url('mascotas/'.$mascota_id.'/consultas/'.$consulta->id)}}" autocomplete="off">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="mb-3">
            <label class="form-label">Veterinaria</label>
            <select name="veterinaria_id" class="form-control">
                @foreach($veterinarias as $veterinaria)
                    @if($consulta->veterinaria_id == $veterinaria->id)
                        <option selected value="{{$veterinaria->id}}">{{$veterinaria->nombre}}</option>
                    @else
                        <option value="{{$veterinaria->id}}">{{$veterinaria->nombre}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha de la consulta</label>
            <input class="form-control" type="date" name="fecha_consulta" value="{{$consulta->fecha_consulta}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha del control</label>
            <input class="form-control" type="date" name="fecha_control" value="{{$consulta->fecha_control}}"  required>
        </div>
        <div class="mb-3">
            <label class="form-label">Sintomas</label>
            <textarea class="form-control" name="sintomas" rows="5">{{$consulta->sintomas}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Diagnostico</label>
            <textarea class="form-control" name="diagnostico" rows="5">{{$consulta->diagnostico}}</textarea>
        </div>
        <hr>
        <h2 class="text-center">Tratamiento</h2> <br>
        <div class="mb-3">
            <label class="form-label">Medicamento</label>
            <input type="text" class="form-control" id="txt_med">
        </div>
        <div class="mb-3">
            <label class="form-label">Dosis</label>
            <input type="text" class="form-control" id="txt_dosis">
        </div>
        <div class="mb-3">
            <label class="form-label">Cantidad dias</label>
            <input type="number" class="form-control" id="txt_cant">
        </div>
        <div class="d-grid gap-2 mb-3">
            <button type="button" onclick="agregar()" class="btn btn-primary" id="btn_add">
                Agregar
            </button>
        </div>

        <div class="container" id="lista">
            @foreach($tratamientos as $tratamiento)
                <div class="mb-3" id="item{{$loop->index}}">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <button type="button" class="btn-close" onclick="quitar('{{$loop->index}}')"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Medicamento</label>
                                <input type="text" class="form-control" name="medicamentoT[]" value="{{$tratamiento->medicamento}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Dosis</label>
                                <input type="text" class="form-control" name="dosisT[]" value="{{$tratamiento->dosis}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cantidad dias</label>
                                <input type="number" class="form-control" name="cantidad_diasT[]" value="{{$tratamiento->cantidad_dias}}">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{url('mascotas/'.$mascota_id.'/consultas')}}" class="btn btn-warning">Atras</a>
        <button type="submit"  id="btn_guardar" class="btn btn-primary">Guardar</button>
    </form>
    <div class="mb-3"></div>
@endsection
@push('scripts')
    <script>

        var cont = {{count($tratamientos)}};


        var cantidad = 0;


        function agregar(){
            cantidad = $('#txt_cant').val();
            var dosis = $('#txt_dosis').val();
            var medicamento = $('#txt_med').val();

            if (cont!= null && cont >= 0 && cantidad != null && cantidad > 0 && dosis != null && medicamento != null){
                var item = '' +
                    '<div class="mb-3" id="item'+cont+'">' +
                    '<div class="modal-content ">' +
                    '<div class="modal-header">' +
                    '<button type="button" class="btn-close"  onclick="quitar(' + cont + ')"></button>' +
                    '</div>' +
                    '<div class="modal-body">' +
                    '<div class="mb-3">' +
                    '<label class="form-label">Medicamento</label>' +
                    '<input type="text" class="form-control" name="medicamentoT[]" value="'+medicamento+'">' +
                    '</div>' +
                    '<div class="mb-3">' +
                    '<label class="form-label">Dosis</label>' +
                    '<input type="text" class="form-control" name="dosisT[]" value="'+dosis+'">' +
                    '</div>' +
                    '<div class="mb-3">' +
                    '<label class="form-label">Cantidad dias</label>' +
                    '<input type="number" class="form-control" name="cantidad_diasT[]" value="'+cantidad+'">' +
                    '</div>' +
                    '</div>' +
                    '</div></div>';
                cont++;
                $("#lista").append(item);

                limpiar();
            }
        }

        function quitar(index){
            cont--;
            $("#item" + index).remove();
            limpiar();
        }

        function limpiar(){
            cantidad = $('#txt_cant').val("");
            dosis = $('#txt_dosis').val("");
            medicamento = $('#txt_med').val("");
        }

    </script>
@endpush