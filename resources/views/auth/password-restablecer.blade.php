<?php
/**
 *@var \Illuminate\Support\ViewErrorBag $errors
 */
?>

@extends('layouts.main')

@section('title', 'Restablecer Contraseña')

@section('main')
<section class="container cont-auth">
    <h1>Restablecer Contraseña</h1>

    <p>Escribí tu nueva contraseña.</p>

    <form action="{{ route('password.update') }}" method="post" class="d-flex flex-column">
        <input type="hidden" name="token" value="{{$token}}"/>
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label"> Email</label>
            <input 
                type="email"
                name="email"
                id="email"
                class="form-control">
            @error('email')
            <div class="text-danger">{{ $errors->first('email') }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label"> Nueva contraseña</label>
            <input 
                type="password"
                name="password"
                id="password"
                class="form-control">
            @error('password')
            <div class="text-danger">{{ $errors->first('password') }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label"> Confirmar nueva contraseña</label>
            <input 
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                class="form-control">
            @error('password_confirmation')
            <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">Restablecer contraseña</button>
    </form>
</section>
@endsection