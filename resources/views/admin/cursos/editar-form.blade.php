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
      <form action="{{route("admin.cursos.editar.ejecutar", ['id'=>$curso -> curso_id])}}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre"
                        value="{{old('nombre', $curso->nombre)}}">
                  @error('nombre')
                  <div class="text-danger">{{ $errors->first('nombre') }}</div>

                  @enderror
            </div>
            <div class="mb-2">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <textarea class="form-control" id="descripcion" name="descripcion"
                        value="{{old('descripcion', $curso->descripcion)}}">{{old('descripcion', $curso->descripcion)}} </textarea>
                  @error('descripcion')
                  <div class="text-danger">{{ $errors->first('descripcion') }}</div>

                  @enderror
            </div>
            <div class="mb-2">
                  <label for="precio" class="form-label">Precio</label>
                  <div class="cont-precio d-flex">
                        <span class="me-3">$</span>
                        <input type="number" class="form-control" id="precio" name="precio"
                              value="{{old('precio', $curso->precio)}}" step="any">
                        @error('precio')
                        <div class="text-danger">{{ $errors->first('precio') }}</div>
                  </div>
                  @enderror
            </div>
          <div class="mb-2">
              <label for="lugar" class="form-label">Dirección</label>
              <input type="text" class="form-control" id="lugar" name="lugar"
                     value="{{old('lugar', $curso->lugar)}}">
              @error('lugar')
              <div class="text-danger">{{ $errors->first('lugar') }}</div>

              @enderror
          </div>
          <div class="mb-2">
              <label for="hora" class="form-label">Comienzo del curso</label>
              <input type="text" class="form-control" id="hora" name="hora" placeholder="** : ** (escribir de esta manera el horario)"
                     value="{{old('hora', $curso->hora)}}">
              @error('hora')
              <div class="text-danger">{{ $errors->first('hora') }}</div>

              @enderror
          </div>
          <div class="mb-2">
              <label for="fecha" class="form-label">Dia del curso</label>
              <input type="date" class="form-control" id="fecha" name="fecha" min="2023-01-01" max="2030-01-01"
                     value="{{old('fecha', $curso->fecha)}}">
              @error('fecha')
              <div class="text-danger">{{ $errors->first('fecha') }}</div>

              @enderror
          </div>
            <div class="mb-2">
                  <label for="clasificacion_id" class="form-label">Clasificacion</label>
                  <select class="form-control" id="clasificacion_id" name="clasificacion_id">

                        @error('clasificacion_id')
                        <div class="text-danger">{{ $errors->first('clasificacion_id') }}</div>

                        @enderror

                        @foreach ($clasificaciones as $clasificacion)
                        <option value="{{$clasificacion->clasificacion_id}}" @selected($clasificacion->clasificacion_id
                              == old('clasificacion_id', $curso->clasificacion_id)) >
                              {{$clasificacion->nombre}}
                        </option>
                        @endforeach
                  </select>
            </div>
            @if ($curso->portada != null && file_exists(public_path('img/'.$curso->portada)))
            <img class="img-edit" src="{{url('img/'.$curso->portada)}}" alt="{{$curso->portada_descripcion}}">
            @else
            Imagen default!
            @endif
            <div class="mb-2">
                  <label for="portada" class="form-label">Portada</label>
                  <input type="file" class="form-control" id="portada" name="portada">
            </div>
            <div class="mb-2">
                  <label for="portada-desc" class="form-label">Descripción de portada</label>
                  <input type="text" class="form-control" id="portada-desc" name="portada_descripcion"
                        value="{{old('portada_descripcion', $curso->portada_descripcion)}}">
            </div>
            <div class="mb-2">
                  <button type="submit" class="btn btn-primary">Modificar curso</button>
            </div>
      </form>
</section>
@endsection
