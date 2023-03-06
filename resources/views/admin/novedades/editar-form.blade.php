<?php
/**
 *@var \Illuminate\Database\Eloquent\Collection\App\Models\Novedad[] $novedades
 *@var \Illuminate\Support\ViewErrorBag $errors
 */
?>
@extends('layouts.admin') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Editar una novedad')

@section('main')
    <section class="container py-4">
        <h1>Editar una novedad</h1>
        <form action="{{route("admin.novedades.editar.ejecutar", ['id' =>$novedad -> novedad_id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{old('titulo', $novedad->titulo)}}">

                @error('titulo')
                <div class="text-danger">{{ $errors->first('titulo') }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="curso_id" class="form-label">Curso</label>
                <select class="form-control" id="curso_id" name="curso_id">

                    @error('curso')
                        <div class="text-danger">{{ $errors->first('curso') }}</div>
                    @enderror

                    @foreach ($cursos as $curso)
                    <option value="{{$curso->curso_id}}"
                            @selected($novedad->curso_id == old('curso', $curso->curso_id)) >
                          {{$curso->nombre}}
                    </option>
                    @endforeach
              </select>
            </div>

            <div class="mb-2">
                <label for="detalle" class="form-label">Detalle</label>
                <textarea class="form-control" id="detalle" name="detalle">{{old('detalle', $novedad->detalle)}}</textarea>

                @error('detalle')
                <div class="text-danger">{{ $errors->first('detalle') }}</div>
                @enderror
            </div>
            @if ($novedad->portada != null && file_exists(public_path('img/'.$novedad->portada)))
            <img class="img-edit" src="{{url('img/'.$novedad->portada)}}" alt="{{$novedad->portada_descripcion}}">
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
                        value="{{old('portada_descripcion', $novedad->portada_descripcion)}}">
            </div>
            <div class="mb-2">
                <button type="submit" class="btn btn-primary">Modificar novedad</button>
          </div>
        </form>
    </section>
@endsection
