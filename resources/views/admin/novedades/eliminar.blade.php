@extends('layouts.admin') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Eliminar novedad')

@section('main')
<section class="container my-4 mb-4">
    <h1>{{$novedad->titulo}}</h1>
    <p>¿Seguro querés eliminar esta novedad? No podrás recuperarla.</p>
    <form action="{{route('admin.novedades.eliminar.ejecutar', ['id' =>$novedad-> novedad_id])}}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Eliminar definitivamente</button>
    </form>
</section>

@endsection