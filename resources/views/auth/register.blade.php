@extends('layouts.main')

@section('title', 'Iniciar Sesion')


@section('main')
<section class="container cont-auth">
    <h1>Iniciar Sesion</h1>

    <form action="{{ route('auth.login.ejecutar') }}" method="post" class="d-flex flex-column">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label"> Email</label>
            <input
                type="email"
                name="email"
                id="email"
                class="form-control"
                required

            >
        </div>
        <div class="mb-3">
            <label for="password" class="form-label"> Password</label>
            <input
                type="password"
                name="password"
                id="password"
                class="form-control"
                required
            >
        </div>

        <button type="submit" class="btn">Ingresar</button>
    </form>
</section>








@endsection
