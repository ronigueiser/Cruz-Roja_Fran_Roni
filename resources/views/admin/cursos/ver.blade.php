@extends('layouts.admin') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Ver curso')

@section('main')
        <section class="container d-flex flex-column my-4 mb-4">
            @if ($curso->portada != null && file_exists(public_path('img/'.$curso->portada)))
                <img class="curso-det-img" src="{{url('img/'.$curso->portada)}}" alt="{{$curso->portada_descripcion}}">
            @endif
            <div class="cont-det-curso">
                <h1 class="negrita">{{$curso->nombre}}</h1>

                <p><span class="negrita">Precio:</span> ${{$curso->precio}}</p>
                <p><span class="negrita">Dirección:</span> {{$curso->lugar}}</p>
                <p><span class="negrita">Fecha:</span> {{$curso->fecha}}</p>
                <p><span class="negrita">Horario:</span> {{$curso->hora}}</p>

                <h2>Descripcion del curso</h2>
                <p>{{$curso->descripcion}}</p>
            </div>


            <a class="btn-primary" aria-current="page" href="{{url('admin/cursos')}}">Volver </a>
        </section>

@endsection
