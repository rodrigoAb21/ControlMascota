@extends('layouts.index')

@section('contenido')
    <form method="POST" action="{{url('/login')}}" autocomplete="off">
        {{csrf_field()}}
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control" />
            <label class="form-label" name="email"  for="email">Email</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="password" name="password" class="form-control" />
            <label class="form-label" for="password">Contraseña</label>
        </div>

        <button type="submit" class="btn btn-primary btn-block mb-4">Iniciar Sesión</button>
        <!-- Submit button -->

        <!-- Register buttons -->
        <div class="text-center">
            <p><a href="#!">Registrar</a> nueva cuenta.</p>
        </div>
    </form>
@endsection
