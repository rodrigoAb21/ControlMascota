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
                    <h4>Nuevo Usuario</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{url('/register')}}" autocomplete="off">
                        {{csrf_field()}}

                        <div class="mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required/>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required/>
                        </div>

                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" minlength="6" id="password" name="password" class="form-control" required/>
                        </div>

                        <div class="row me-1 ms-1">
                            <button type="submit" class="btn btn-primary btn-block mb-4 ">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>

@endsection
