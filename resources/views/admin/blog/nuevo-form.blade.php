<?php
/**
 *@var \Illuminate\Database\Eloquent\Collection\App\Models\Comentarios[] $comentarios
 *@var \Illuminate\Support\ViewErrorBag $errors
 */
?>
@extends('layouts.admin') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Publicar un nuevo comentario')

@section('main')
    <section class="container py-4">
        <h1>Publicar un nuevo comentario</h1>
        <form action="{{route("admin.comentarios.nuevo.grabar")}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
                @error('nombre')
                <div class="text-danger">{{ $errors->first('nombre') }}</div>

                @enderror
            </div>
            <div class="mb-2">
                <label for="comentario" class="form-label">Comentario</label>
                <input type="text" class="form-control" id="comentario" name="comentario" value="{{old('comentario')}}">
                @error('Comentario')
                <div class="text-danger">{{ $errors->first('comentario') }}</div>

                @enderror
            </div>
            <div class="mb-2">
                <label for="curso" class="form-label">Curso</label>
                <input type="text" class="form-control" id="curso" name="curso" value="{{old('curso')}}">
                @error('curso')
                <div class="text-danger">{{ $errors->first('curso') }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <button type="submit" class="btn btn-primary">Publicar comentario</button>
            </div>
        </form>
    </section>
@endsection
