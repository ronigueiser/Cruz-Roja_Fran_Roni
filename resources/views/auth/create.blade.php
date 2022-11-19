@extends('layouts.main')

@section('title', 'Registrarse')


@section('main')
<section class="container cont-auth">
    <h1>Registrarse</h1>
    <form method="POST" action="{{ route('register') }}" class="d-flex flex-column mb-3">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn">Registrarse</button>
    </form>
    <p>¿Ya tenés una cuenta? <a href="{{route('auth.login.form')}}">Hacé click acá para iniciar sesión.</a></p>
</section>

@endsection