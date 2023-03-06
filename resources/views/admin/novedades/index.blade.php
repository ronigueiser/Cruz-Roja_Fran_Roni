<?php
/**
 *@var \Illuminate\Database\Eloquent\Collection\App\Models\Novedad[] $novedades
 */
?>
@extends('layouts.admin') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Administrar Blog')

@section('main')
      <section class="container py-4 cont-admin">
            <h1 class="negrita">Panel de Administración</h1>

            <h2 class="d-inline-block me-3">Blog</h2>
            <p class="d-inline-block btn-nuevo btn btn-success">
                  <a href="{{route('admin.novedades.nuevo.form')}}">Publicar nueva novedad</a>
            </p>
            <div class="mb-3">
                  <form action="{{route('admin.novedades.listado')}}" method="get">
                        <label for="titulo" class="form-label negrita">Buscar por titulo de la novedad</label>
                        <div  class="d-flex justify-content-between">
                        <input type="text" name="titulo" id="titulo" class="form-control me-5" value="{{$buscarParams['titulo'] ?? null}}">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                  </form>
            </div>
            <table class="table table-bordered table-striped">
                  <thead>
                        <tr>
                              <th>ID</th>
                              <th>Titulo</th>
                              <th>Curso</th>
                              <th>Detalle</th>

                              <th>Acciones</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach ($novedades as $novedad)

                        <tr>
                              <td>{{$novedad->novedad_id}}</td>
                              <td>{{$novedad->titulo}}</td>
                              <td>{{$novedad->curso->nombre}}</td>
                              <td>{{$novedad->detalle}}</td>
                              <td>
                                    <a href="{{route('admin.novedades.ver', ['id' => $novedad->novedad_id])}}" class="btn btn-actions btn-primary"><i class="fa-solid fa-eye pe-2"></i>Ver</a>
                                    <a href="{{route('admin.novedades.editar.form', ['id' => $novedad->novedad_id])}}" class="btn btn-actions btn-success"> <i class="fa-solid fa-pen-to-square pe-2"></i>Editar</a>
                                    <a href="{{route('admin.novedades.eliminar.confirmar', ['id' => $novedad->novedad_id])}}" class="btn btn-actions btn-danger"><i class="fa-solid fa-trash pe-2"></i>Eliminar</a>
                              </td>
                        </tr>
                        @endforeach
                  </tbody>
            </table>
            {{$novedades->links()}}
        </section>
@endsection
