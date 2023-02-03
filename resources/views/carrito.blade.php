@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Cursos')

@section('main')
<section class=" container">
    <h1 class="negrita py-3">Mi Carrito</h1>
    <ul class="catalogo-cursos">
        @foreach ($cursos as $curso)
        <li class="card cont-curso">
            @if ($curso->portada != null && file_exists(public_path('img/'.$curso->portada)))
            <img src="{{url('img/'.$curso->portada)}}" alt="{{$curso->portada_descripcion}}" class="card-img-top">
            @else
            <img class="contain card-img-top src=" {{url('img/cruz-roja.png')}}" alt="No hay foto para mostrar.">
            @endif
            <div class="card-body">
                <h2 class="negrita">{{$curso->nombre}}</h2>
                <p>{{$curso->descripcion}}</p>
                <p>Precio: <span class="negrita">${{$curso->precio}}</span></p>
            </div>
            {{-- <div class="card-footer">
                <a href="{{ url('/{{$curso->curso_id}}') }}" class="btn btn-success agregar-item-carrito"><i
                        class="fas fa-shopping-cart icono-carrito-btn"></i>Agregar al carrito</a>
            </div> --}}
        </li>
        @endforeach

    </ul>
</section>

@endsection