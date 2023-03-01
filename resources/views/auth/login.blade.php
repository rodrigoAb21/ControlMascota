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
                <div class="card-body">
                    <form method="POST" action="{{url('/login')}}" autocomplete="off">
                        {{csrf_field()}}

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required/>
                        </div>

                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control"required/>
                        </div>

                        <div class="row me-1 ms-1">
                            <button type="submit" class="btn btn-primary btn-block mb-4 ">Iniciar Sesión</button>
                        </div>
                        <div class="text-center">
                            <p><a href="{{url('/register')}}">Registrar</a> nueva cuenta.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>

@endsection
