<?php
/**
 *@var \Illuminate\Support\ViewErrorBag $errors
 */
?>

@extends('layouts.main')

@section('title', 'Recuperar Contraseña')

@section('main')
<section class="container cont-auth">
    <h1>Recuperar Contraseña</h1>

    <p>¿Olvidaste tu contraseña? Completá tu email para restablecerla.</p>

    <form action="{{ route('password.email') }}" method="post" class="d-flex flex-column">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label"> Email</label>
            <input type="email" name="email" id="email" class="form-control">
            @error('email')
            <div class="text-danger">{{ $errors->first('email') }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">Enviar email de recuperación</button>
    </form>
</section>
@endsection