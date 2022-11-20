@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Eliminar curso')

@section('main')
<section class="container my-4 mb-4">
    <h1>{{$usuario->email}}</h1>
    <p>¿Seguro querés eliminar el usuario?</p>
    <form action="{{route('admin.usuarios.eliminar.ejecutar', ['id' =>$usuario -> usuario_id])}}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Eliminar definitivamente</button>
    </form>

    <a class="" aria-current="page" href="{{url('admin/usuarios')}}">Volver </a>
</section>

@endsection
