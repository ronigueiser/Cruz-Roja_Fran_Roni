@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Ver curso')

@section('main')
<section class="container d-flex flex-column my-4 mb-4">
    <div class="cont-det-curso">
        <h1 class="negrita">{{$usuario->email}}</h1>

        @if ($usuario->curso_id !== 0)
        <h2>Curso contratado: {{$usuario->curso->nombre}}</h2>
        
        <img class="curso-det-img mb-3" src="{{url('img/'.$usuario->curso->portada)}}"
        alt="{{$usuario->curso->portada_descripcion}}">
        <p><span class="negrita">Precio:</span> ${{$usuario->curso->precio}}</p>
        <p>{{$usuario->curso->descripcion}}</p>
        @else
        <h2>Curso contratado: Ninguno</h2>
            
        @endif

    </div>



    <a class="" aria-current="page" href="{{url('admin/usuarios')}}">Volver </a>
</section>

@endsection