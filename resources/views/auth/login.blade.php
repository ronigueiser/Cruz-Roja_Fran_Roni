@extends('layouts.main')

@section('title', 'Iniciar Sesion')


@section('main')
    <h1>Iniciar Sesion</h1>

    <form action="{{ route('auth.login.ejecutar') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label"> Email</label>
            <input
                type="email"
                name="email"
                id="email"
                class="form-control"
            >
        </div>
        <div class="mb-3">
            <label for="password" class="form-label"> Password</label>
            <input
                type="password"
                name="password"
                id="password"
                class="form-control"
            >
        </div>

        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
    </form>









@endsection
