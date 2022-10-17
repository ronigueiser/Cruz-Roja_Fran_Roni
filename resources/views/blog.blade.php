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

    <h1 class="negrita">Experiencias de nuestros voluntarios</h1>
    <ul class="cont-blog">
        @foreach ($comentarios as $comentario)
        <li class="item-blog">
            <h2 class="negrita" >{{$comentario->usuario}}</h2>
            <p>Curso realizado: {{$comentario->curso}}</p>

            <blockquote>"{{$comentario->comentario}}"</blockquote>

        </li>
        @endforeach

    </ul>



</section>
@endsection
