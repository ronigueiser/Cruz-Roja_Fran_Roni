
@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Ver curso')

@section('main')
        <section class="container d-flex flex-column my-4 mb-4">
            <div class="cont-det-curso">
                <h1 class="negrita">Comentario de {{$comentario->usuario}}</h1>

                <p><span class="negrita">Curso:</span> {{$comentario->curso}}</p>

                <p class="negrita">Comentario:</p>
                <p>{{$comentario->comentario}}</p>
            </div>


            <a class="" aria-current="page" href="{{url('admin/blog')}}">Volver </a>
        </section>

@endsection
