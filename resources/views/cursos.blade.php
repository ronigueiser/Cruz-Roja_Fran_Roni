
@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Cursos')

@section('main')
        <section class="row">
            <ul>
                @foreach ($cursos as $curso)
                    <li class="cont-curso">{{$curso->nombre}}</li>
                @endforeach
                
            </ul>
        </section>

@endsection
