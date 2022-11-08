
@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Ver novedad')

@section('main')
        <section class="container d-flex flex-column my-4 mb-4">
            <div class="cont-det-curso">
                <h1 class="negrita">{{$novedad->titulo}}</h1>
                @if($novedad->curso)
                <h2 class="negrita">Curso:</h2>
                <p>{{$novedad->curso->nombre}}</p>
                @endif
                <h2 class="negrita">Detalle:</h2>
                <p>{{$novedad->detalle}}</p>
            </div>


            <a class="" aria-current="page" href="{{url('admin/novedades')}}">Volver </a>
        </section>

@endsection
