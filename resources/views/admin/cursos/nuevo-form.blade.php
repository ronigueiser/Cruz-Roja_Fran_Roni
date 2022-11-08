<?php
/**
 *@var \Illuminate\Database\Eloquent\Collection\App\Models\Curso[] $cursos
 *@var \Illuminate\Support\ViewErrorBag $errors
 */
?>
@extends('layouts.admin') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Publicar un nuevo curso')

@section('main')
<section class="container py-4">
      <h1>Publicar un nuevo curso</h1>
      <form action="{{route("admin.cursos.nuevo.grabar")}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
                  @error('nombre')
                  <div class="text-danger">{{ $errors->first('nombre') }}</div>

                  @enderror
            </div>
            <div class="mb-2">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{old('descripcion')}}">
                  @error('descripcion')
                  <div class="text-danger">{{ $errors->first('descripcion') }}</div>

                  @enderror
            </div>
            <div class="mb-2">
                  <label for="precio" class="form-label">Precio</label>
                  <input type="number" class="form-control" id="precio" name="precio" step="any" value="{{old('precio')}}">
                  @error('precio')
                  <div class="text-danger">{{ $errors->first('precio') }}</div>

                  @enderror
            </div>
            <div class="mb-2">
                  <label for="clasificacion_id" class="form-label">Clasificacion</label>
                  <select
                        class="form-control"
                        id="clasificacion_id"
                        name="clasificacion_id">
                        
                        @error('clasificacion_id')
                        <div class="text-danger">{{ $errors->first('clasificacion_id') }}</div>
                        
                        @enderror
                        
                        @foreach ($clasificaciones as $clasificacion)
                        <option 
                        value="{{$clasificacion->clasificacion_id}}"
                        @selected($clasificacion->clasificacion_id == old('clasificacion_id')) >
                        {{$clasificacion->nombre}}
                  </option>
                  @endforeach
            </select>
            </div>
            <div class="mb-2">
                  <label for="portada" class="form-label">Portada</label>
                  <input type="file" class="form-control" id="portada" name="portada" >
            </div>
            <div class="mb-2">
                  <label for="portada-desc" class="form-label">Descripción de portada</label>
                  <input type="text" class="form-control" id="portada-desc" name="portada_descripcion" value="{{old('portada_descripcion')}}">
            </div>
            <div class="mb-2">
                  <button type="submit" class="btn btn-primary">Publicar curso</button>
            </div>
      </form>
</section>
@endsection
