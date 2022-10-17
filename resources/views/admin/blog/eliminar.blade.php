@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Eliminar curso')

@section('main')
<section class="container my-4 mb-4">
    <h1>{{$comentario->usuario}}</h1>
    <p>¿Seguro querés eliminar el comentario de {{$comentario->usuario}}?</p>
    <form action="{{route('admin.comentarios.eliminar.ejecutar', ['id' =>$comentario -> comentario_id])}}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Eliminar definitivamente</button>
    </form>
</section>

@endsection