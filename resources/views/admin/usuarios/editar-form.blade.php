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
      <h1>Editar un Usuario</h1>
      <form action="{{route("admin.cursos.editar.ejecutar", ['id'=>$usuario -> usuario_id])}}" method="post"
            enctype="multipart/form-data">
            @csrf

          <h2>{{$usuario->email}}</h2>


          <div class="mb-2">

              <h2>Curso anotado:</h2>
              <p>{{$usuario->curso->nombre}}</p>

              <label for="rol" class="form-label">Cambiar curso</label>
              <select name="cursos" id="cursos" form="cursoform">
                    <option value="error">Selecciona...</option>
                  @foreach ($curso as $c)
                    <option value="{{$c->nombre}}">{{$c->nombre}}</option>
                  @endforeach

              </select>

          </div>



            <div class="mb-2">
                  <button type="submit" class="btn btn-primary">Modificar Usuario</button>
            </div>
      </form>

    <a class="" aria-current="page" href="{{url('admin/usuarios')}}">Volver </a>
</section>
@endsection
