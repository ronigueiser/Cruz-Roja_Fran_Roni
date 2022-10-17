@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Cursos')

@section('main')
<section class=" container">
    <h1 class="negrita py-3">Cursos disponibles en la Cruz Roja</h1>
    <ul class="catalogo-cursos">
        @foreach ($cursos as $curso)
        <li class="cont-curso">
            @if ($curso->portada != null && file_exists(public_path('img/'.$curso->portada)))
            <img src="{{url('img/'.$curso->portada)}}" alt="{{$curso->portada_descripcion}}">
            @else
            <img class="contain" src="{{url('img/cruz-roja.png')}}" alt="No hay foto para mostrar.">
            @endif
            <h2 class="negrita">{{$curso->nombre}}</h2>
            <p>{{$curso->descripcion}}</p>
            <p>Precio: <span class="negrita">${{$curso->precio/100}}</span></p>
        </li>
        @endforeach

    </ul>
</section>

@endsection