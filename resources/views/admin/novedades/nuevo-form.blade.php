<?php
/**
 *@var \Illuminate\Database\Eloquent\Collection\App\Models\Novedad[] $novedades
 *@var \Illuminate\Support\ViewErrorBag $errors
 */
?>
@extends('layouts.admin') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Publicar una nueva novedad')

@section('main')
<section class="container py-4">
    <h1>Publicar una nueva novedad</h1>
    <form action="{{route("admin.novedades.nuevo.grabar")}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <label for="titulo" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{old('titulo')}}">

            @error('titulo')
            <div class="text-danger">{{ $errors->first('titulo') }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label for="curso_id" class="form-label">Curso</label>
            <select class="form-control" id="curso_id" name="curso_id">

                @error('curso_id')
                <div class="text-danger">{{ $errors->first('curso_id') }}</div>
                @enderror

                @foreach ($cursos as $curso)
                <option value="{{$curso->curso_id}}" @selected($curso->curso_id == old('curso_id')) >
                    {{$curso->nombre}}
                </option>
                @endforeach

            </select>
        </div>
        <div class="mb-2">
            <label for="detalle" class="form-label">Detalle</label>
            <textarea class="form-control" id="detalle" name="detalle">{{old('detalle')}}</textarea>
            @error('detalle')
            <div class="text-danger">{{ $errors->first('detalle') }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <button type="submit" class="btn btn-primary">Publicar novedad</button>
        </div>
    </form>
</section>
@endsection