<?php
/**
 *@var \Illuminate\Database\Eloquent\Collection\App\Models\Curso[] $cursos
 *@var \Illuminate\Support\ViewErrorBag $errors
 */
?>
@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Editar perfil')

@section('main')
<section class="container py-4">
      <h1>Editar perfil</h1>
      <form action="{{route("perfil.editar.ejecutar", ['id'=>$usuario -> usuario_id])}}" method="post">
            @csrf
            <div class="mb-2">
                  <label for="username" class="form-label">Nombre de usuario</label>
                  <input type="text" class="form-control" id="username" name="username"
                        value="{{old('username', $usuario->username)}}">
                  @error('username')
                  <div class="text-danger">{{ $errors->first('username') }}</div>

                  @enderror
            </div>
            <div class="mb-2">
                  <label for="email" class="form-label">Correo</label>
                  <input type="text" class="form-control" id="email" name="email"
                        value="{{old('email', $usuario->email)}}">
                  @error('email')
                  <div class="text-danger">{{ $errors->first('email') }}</div>

                  @enderror
            </div>
            
            <div class="mt-4 mb-2">
                  <button type="submit" class="btn btn-primary">Confirmar modificación</button>
            </div>
      </form>
</section>
@endsection