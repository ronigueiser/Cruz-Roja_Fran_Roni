<?php
/**
 *@var \Illuminate\Database\Eloquent\Collection\App\Models\Curso[] $cursos
 */
?>
@extends('layouts.admin') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Administrador')

@section('main')
<section class="container py-4 cont-admin">
      <h1 class="negrita">Panel de Administración</h1>

      <h2 class="d-inline-block me-3">Usuarios</h2>
      {{-- <p class="d-inline-block btn-nuevo btn btn-success">--}}
            {{-- <a href="{{route('admin.usuarios.nuevo.form')}}">Crear nuevo usuario</a>--}}
            {{-- </p>--}}
      <section class="mb-3">
            <form action="{{route('admin.usuarios.listado')}}" method="get">
                  <label for="email" class="form-label negrita">Buscar usuario por email</label>
                  <div class="d-flex justify-content-between">
                        <input type="text" name="email" id="email" class="form-control me-5"
                              value="{{$buscarParams['email'] ?? null}}">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                  </div>
            </form>
      </section>
      <table class="table table-bordered table-striped">
            <thead>
                  <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Curso</th>
                        <th>Acciones</th>
                  </tr>
            </thead>
            <tbody>
                  @foreach ($usuarios as $usuario)

                  <tr>
                        <td>{{$usuario->usuario_id}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->role->nombre}}</td>
                        @if ($usuario->curso_id !== 0)
                        <td>{{$usuario->curso->nombre}}</td>
                        @else
                        <td>-</td>
                        @endif
                        <td>
                              <a href="{{route('admin.usuarios.ver', ['id' => $usuario->usuario_id])}}"
                                    class="btn  btn-actions btn-primary"><i class="fa-solid fa-eye pe-2"></i>Ver</a>
                              {{-- <a href="{{route('admin.usuarios.editar.form', ['id' => $usuario->usuario_id])}}"
                                    class="btn  btn-actions btn-success"> <i
                                          class="fa-solid fa-pen-to-square pe-2"></i>Editar</a>--}}
                              {{-- <a
                                    href="{{route('admin.usuarios.eliminar.confirmar', ['id' => $usuario->usuario_id])}}"
                                    class="btn  btn-actions btn-danger"><i
                                          class="fa-solid fa-trash pe-2"></i>Eliminar</a>--}}
                        </td>
                  </tr>
                  @endforeach
            </tbody>
      </table>
      {{$usuarios->links()}}
</section>

@endsection