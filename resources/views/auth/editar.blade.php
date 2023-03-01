@extends('layouts.index')

@section('contenido')
    <div class="row mt-4">
        <div class="col"></div>
        <div class="col-md-6 col-xs-12 col-sm-12">
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
                    <h4>Editar Usuario</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{url('/actualizar')}}" autocomplete="off">
                        @method('PATCH')
                        @csrf

                        <div class="mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" value="{{$usuario->nombre}}" name="nombre" class="form-control" required/>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" value="{{$usuario->email}}" id="email" name="email" class="form-control" required/>
                        </div>

                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" minlength="6" id="password" name="password" class="form-control" />
                        </div>

                        <div class="row me-1 ms-1">
                            <button type="submit" class="btn btn-primary btn-block mb-4 ">Actualizar</button>
                            <button type="button" class="btn btn-danger" onclick="modalEliminar('{{url('eliminar')}}')">
                                <i class="fa fa-trash"></i> Eliminar Cuenta
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="col"></div>

    </div>

    @include('vistas.modal')
    @push('scripts')
        <script>
            function modalEliminar(url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar Usuario");
                $('#modalEliminarEnunciado').html("¿Realmente deseas eliminar tu cuenta?");
                $('#modalEliminar').modal('show');
            }
        </script>
    @endpush()

@endsection
