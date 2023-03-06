<?php
/**
 *@var \Illuminate\Database\Eloquent\Collection\App\Models\Curso[] $cursos
 */
?>
@extends('layouts.admin') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Administrar Cursos')

@section('main')
      <section class="container py-4 cont-admin">
            <h1 class="negrita">Panel de Administración</h1>

            <h2 class="d-inline-block me-3">Cursos</h2>

            <p class="d-inline-block btn-nuevo btn btn-success">
                  <a href="{{route('admin.cursos.nuevo.form')}}">Publicar nuevo curso</a>
            </p>
            <div class="mb-3">
                  <form action="{{route('admin.cursos.listado')}}" method="get">
                        <label for="nombre" class="form-label negrita">Buscar por nombre del curso</label>
                        <div  class="d-flex justify-content-between">
                        <input type="text" name="nombre" id="nombre" class="form-control me-5" value="{{$buscarParams['nombre'] ?? null}}">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                  </form>
            </div>
            <table class="table table-bordered table-striped">
                  <thead>
                        <tr>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Precio</th>
                              <th>Clasificacion</th>
                              <th>Descripcion</th>
                              <th>Lugar</th>
                              <th>Fecha</th>
                              <th>Horario</th>
                              <th>Acciones</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach ($cursos as $curso)

                        <tr>
                              <td>{{$curso->curso_id}}</td>
                              <td>{{$curso->nombre}}</td>
                              <td>${{$curso->precio}}</td>
                              <td>{{$curso->clasificacion->abreviatura}}</td>
                              <td>{{$curso->descripcion}}</td>
                              <td>{{$curso->lugar}}</td>
                              <td>{{$curso->fecha}}</td>
                              <td>{{$curso->hora}}</td>
                              <td>
                                    <a href="{{route('admin.cursos.ver', ['id' => $curso->curso_id])}}" class="btn  btn-actions btn-primary"><i class="fa-solid fa-eye pe-2"></i>Ver</a>
                                    <a href="{{route('admin.cursos.editar.form', ['id' => $curso->curso_id])}}" class="btn  btn-actions btn-success"> <i class="fa-solid fa-pen-to-square pe-2"></i>Editar</a>
                                    <a href="{{route('admin.cursos.eliminar.confirmar', ['id' => $curso->curso_id])}}" class="btn  btn-actions btn-danger"><i class="fa-solid fa-trash pe-2"></i>Eliminar</a>
                              </td>
                        </tr>
                        @endforeach
                  </tbody>
            </table>
            {{$cursos->links()}}
        </section>

@endsection
