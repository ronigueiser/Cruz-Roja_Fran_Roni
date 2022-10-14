<?php
/**
 *@var \Illuminate\Database\Eloquent\Collection\App\Models\Curso[] $cursos
 *@var \Illuminate\Support\ViewErrorBag $errors
 */
?>
@extends('layouts.admin') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Editar un curso')

@section('main')
<section class="container py-4">
      <h1>Editar un curso</h1>
      <form action="{{route("admin.cursos.editar.ejecutar", ['id' =>$curso -> curso_id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre', $curso->nombre)}}">
                  @error('nombre')
                  <div class="text-danger">{{ $errors->first('nombre') }}</div>
                      
                  @enderror
            </div>
            <div class="mb-2">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{old('descripcion', $curso->descripcion)}}">
                  @error('descripcion')
                  <div class="text-danger">{{ $errors->first('descripcion') }}</div>
                      
                  @enderror
            </div>
            <div class="mb-2">
                  <label for="precio" class="form-label">Precio</label>
                  <input type="number" class="form-control" id="precio" name="precio" value="{{old('precio', $curso->precio)}}">
                  @error('precio')
                  <div class="text-danger">{{ $errors->first('precio') }}</div>
                      
                  @enderror
            </div>
            @if ($curso->portada != null && file_exists(public_path('img/'.$curso->portada)))
            <img src="{{url('img/'.$curso->portada)}}" alt="{{$curso->portada_descripcion}}">
            @else
            Imagen default!
        @endif
            <div class="mb-2">
                  <label for="portada" class="form-label">Portada</label>
                  <input type="file" class="form-control" id="portada" name="portada" value="{{old('portada', $curso->portada)}}">
            </div>
            <div class="mb-2">
                  <label for="portada-desc" class="form-label">Descripción de portada</label>
                  <input type="text" class="form-control" id="portada_descripcion" name="portada_descripcion" value="{{old('portada_descripcion', $curso->portada_descripcion)}}">
            </div>
            <div class="mb-2">
                  <button type="submit" class="btn btn-primary">Publicar curso</button>
            </div>
      </form>
</section>
@endsection