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
                 <h4> Nueva consulta </h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{url('mascotas/'.$mascota_id.'/consultas')}}" autocomplete="off">
                    {{csrf_field()}}
                    <div class="mb-3">
                        <label class="form-label">Veterinaria*</label>
                        <select name="veterinaria_id" class="form-control" required>
                            @foreach($veterinarias as $veterinaria)
                                <option value="{{$veterinaria->id}}">{{$veterinaria->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de la consulta*</label>
                        <input class="form-control" type="date" name="fecha_consulta" value="{{date('Y-m-d')}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Motivo de la consulta*</label>
                        <textarea class="form-control" name="motivo" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Diagnóstico</label>
                        <textarea class="form-control" name="diagnostico" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha del control</label>
                        <input class="form-control" type="date" name="fecha_control" value="{{date('Y-m-d')}}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Costo Bs.</label>
                        <input class="form-control" type="number" name="costo" step="0.01" min="0" value="0">
                    </div>
                    <hr>
                    <h2 class="text-center">Tratamiento</h2> <br>
                    <div class="mb-3">
                        <label class="form-label">Medicamento*</label>
                        <input type="text" class="form-control" id="txt_med">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dosis diaria*</label>
                        <input type="text" class="form-control" id="txt_dosis">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad de días*</label>
                        <input type="number" class="form-control" id="txt_cant">
                    </div>
                    <div class="d-grid gap-2 mb-3">
                        <button type="button" onclick="agregar()" class="btn btn-primary" id="btn_add">
                            Agregar
                        </button>
                    </div>
    
                    <div class="container" id="lista">
    
                    </div>
             
                    
                    <button type="submit" class="float2">
                        <i class="fa fa-check fa-2x my-float3"></i>
                    </button>
                    <a href="{{url('mascotas/'.$mascota_id.'/consultas')}}" class="float">
                        <i class="fa fa-arrow-left fa-2x my-float"></i>
                    </a>
                </form>
            </div>
        </div>
    </div>
    <div class="col"></div>
    
</div>

            
@endsection
@push('scripts')
    <script>
        var cont = 0;
        var cantidad = 0;


        function agregar(){
            cantidad = $('#txt_cant').val();
            var dosis = $('#txt_dosis').val();
            var medicamento = $('#txt_med').val();

            if (cont >= 0 && cantidad != null && cantidad > 0 && dosis != null  && dosis != ""  && medicamento != null){
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
                            '<label class="form-label">Dosis diaria</label>' +
                            '<input type="text" class="form-control" name="dosisT[]" value="'+dosis+'">' +
                        '</div>' +
                        '<div class="mb-3">' +
                            '<label class="form-label">Cantidad de días</label>' +
                            '<input type="number" class="form-control" name="cantidad_diasT[]" value="'+cantidad+'">' +
                        '</div>' +
                    '</div>' +
                    '</div></div>';
                cont++;
                $("#lista").append(item);
                limpiar();
            } else {
                alert("Rellene todos los campos del tratamiento.");
            }
        }

        function quitar(index){
            cont--;
            $("#item" + index).remove();
            evaluar();
            limpiar();
        }

        function limpiar(){
            cantidad = $('#txt_cant').val("");
            var dosis = $('#txt_dosis').val("");
            var medicamento = $('#txt_med').val("");
        }

        function evaluar(){
            if (cont > 0) {
                $("#btn_guardar").show();
            }else{
                $("#btn_guardar").hide();
            }
        }
    </script>
@endpush
