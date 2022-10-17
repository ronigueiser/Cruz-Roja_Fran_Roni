<?php
/**
 *@var \Illuminate\Database\Eloquent\Collection\App\Models\Comentario[] $comentarios
 *@var \Illuminate\Support\ViewErrorBag $errors
 */
?>
@extends('layouts.admin') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Editar un comentario')

@section('main')
    <section class="container py-4">
        <h1>Editar un comentario</h1>
        <form action="{{route("admin.comentario.editar.ejecutar", ['id' =>$comentario -> comentario_id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre', $comentario->nombre)}}">
                @error('nombre')
                <div class="text-danger">{{ $errors->first('nombre') }}</div>

                @enderror
            </div>
            <div class="mb-2">
                <label for="comentario" class="form-label">Comentario</label>
                <input type="text" class="form-control" id="comentario" name="comentario" value="{{old('comentario', $comentario->comentario)}}">
                @error('comentario')
                <div class="text-danger">{{ $errors->first('comentario') }}</div>

                @enderror
            </div>
            <div class="mb-2">
                <label for="curso" class="form-label">Curso</label>
                <input type="text" class="form-control" id="curso" name="curso" value="{{old('precio', $comentario->curso)}}">
                @error('curso')
                <div class="text-danger">{{ $errors->first('curso') }}</div>

                @enderror
            </div>
        </form>
    </section>
@endsection
