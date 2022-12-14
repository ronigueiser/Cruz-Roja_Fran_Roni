{{--

@extends(path)
Path debe ser la ruta, a partir de [resources/views]
Debemos aclarar en que espacio "cedido" por el template queremos ubicar el contenido, esto se logra con:
@section('name') y @endsection


--}}

@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Blog')

@section('main')
<section class="container cont-blog my-4 mb-4">

    <h1 class="negrita">Blog: mirá las novedades de Cruz Roja</h1>
    <ul class="cont-blog">
        @foreach ($novedades as $novedad)
        <li class="item-blog">
            @if ($novedad->portada != null && file_exists(public_path('img/'.$novedad->portada)))
            <img class="d-block mb-3 novedad-img" src="{{url('img/'.$novedad->portada)}}" alt="{{$novedad->portada_descripcion}}">
            @else
            <img class="contain d-block mb-3 novedad-img" src="{{url('img/cruz-roja.png')}}" alt="No hay foto para mostrar.">
            @endif
            <h2 class="negrita d-inline-block me-3" >{{$novedad->titulo}}</h2>
            <span class="chip-curso d-inline-block">{{$novedad->curso->nombre}}</span>
            <h3 class="titulo-detalle negrita">¿Qué hicimos?</h3>
            <p>{{$novedad->detalle}}</p>

        </li>
        @endforeach

    </ul>



</section>
@endsection
