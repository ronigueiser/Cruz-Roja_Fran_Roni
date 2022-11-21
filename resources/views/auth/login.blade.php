<?php
/**
 *@var \Illuminate\Support\ViewErrorBag $errors
 */
?>

@extends('layouts.main')

@section('title', 'Iniciar Sesion')

@section('main')
<section class="container cont-auth">
    <h1>Iniciar Sesion</h1>

    <form action="{{ route('auth.login.ejecutar') }}" method="post" class="d-flex flex-column mb-3">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label"> Email</label>
            <input type="email" name="email" id="email" class="form-control">
            @error('email')
            <div class="text-danger">{{ $errors->first('email') }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label"> Password</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')
            <div class="text-danger">{{ $errors->first('password') }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">Ingresar</button>
    </form>
    {{-- <p>¿Olvidaste tu contraseña? <a href="{{route('password.email')}}">Hacé click acá para restablecerla.</a></p>
    --}}
</section>
@endsection