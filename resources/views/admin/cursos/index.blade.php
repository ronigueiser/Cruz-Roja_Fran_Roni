<?php
/**
 *@var \Illuminate\Database\Eloquent\Collection\App\Models\Curso[] $cursos
 */
?>
@extends('layouts.admin') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Administrador')

@section('main')
      <section class="container py-4">
            <h1>Admin :)</h1>
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
                                    <a href="{{route('admin.cursos.ver', ['id' => $curso->curso_id])}}" class="btn btn-primary">Ver</a>
                                    <a href="{{route('admin.cursos.editar.form', ['id' => $curso->curso_id])}}" class="btn btn-success">Editar</a>
                                    <a href="{{route('admin.cursos.eliminar.confirmar', ['id' => $curso->curso_id])}}" class="btn btn-danger">Eliminar</a>
                              </td>
                        </tr>
                        @endforeach
                  </tbody>
            </table>
        </section>
@endsection
