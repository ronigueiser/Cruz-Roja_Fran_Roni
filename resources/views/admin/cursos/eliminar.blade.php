@extends('layouts.admin') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Eliminar curso')

@section('main')
<section class="container my-4 mb-4">
    <h1>{{$curso->nombre}}</h1>
    <p>¿Seguro querés eliminar el curso?</p>
    <form action="{{route('admin.cursos.eliminar.ejecutar', ['id' =>$curso -> curso_id])}}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Eliminar definitivamente</button>
    </form>
</section>

@endsection