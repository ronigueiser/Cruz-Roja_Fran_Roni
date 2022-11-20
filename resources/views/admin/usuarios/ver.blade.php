
@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Ver curso')

@section('main')
        <section class="container d-flex flex-column my-4 mb-4">
            <div class="cont-det-curso">
                <h1 class="negrita">{{$usuario->email}}</h1>

                <p><span class="negrita">Rol:</span> ${{$usuario->role->nombre}}</p>

                <h2>Curso contratado</h2>
                <p>{{$usuario->curso->nombre}}</p>
            </div>


            <a class="" aria-current="page" href="{{url('admin/usuarios')}}">Volver </a>
        </section>

@endsection
