<?php
/**
 *@var \Illuminate\Database\Eloquent\Collection\App\Models\Curso[] $cursos
 */
?>
@extends('layouts.admin') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Administrador')

@section('main')
      <section class="container py-4">
            <h1>Panel de Administración</h1>

            <a href="{{route('admin.comentarios.listado')}}" class="btn btn-primary">Panel del Blog</a>

            <h2>Cursos</h2>
            <p>
                  <a href="{{route('admin.cursos.nuevo.form')}}">Publicar nuevo curso</a>
            </p>
            <table class="table table-bordered table-striped">
                  <thead>
                        <tr>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Precio</th>
                              <th>Descripcion</th>

                              <th>Acciones</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach ($cursos as $curso)

                        <tr>
                              <td>{{$curso->curso_id}}</td>
                              <td>{{$curso->nombre}}</td>
                              <td>{{$curso->precio}}</td>
                              <td>{{$curso->descripcion}}</td>
                              <td>
                                    <a href="{{route('admin.cursos.ver', ['id' => $curso->curso_id])}}" class="btn  btn-actions btn-primary"><i class="fa-solid fa-eye pe-2"></i>Ver</a>
                                    <a href="{{route('admin.cursos.editar.form', ['id' => $curso->curso_id])}}" class="btn  btn-actions btn-success"> <i class="fa-solid fa-pen-to-square pe-2"></i>Editar</a>
                                    <a href="{{route('admin.cursos.eliminar.confirmar', ['id' => $curso->curso_id])}}" class="btn  btn-actions btn-danger"><i class="fa-solid fa-trash pe-2"></i>Eliminar</a>
                              </td>
                        </tr>
                        @endforeach
                  </tbody>
            </table>
        </section>
@endsection
