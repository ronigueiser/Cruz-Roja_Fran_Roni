
@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Ver curso')

@section('main')
        <section class="row">
            @if ($curso->portada != null && file_exists(public_path('img/'.$curso->portada)))
                <img src="{{url('img/'.$curso->portada)}}" alt="{{$curso->portada_descripcion}}">
                @else
                Imagen default!
            @endif
            <h1>{{$curso->nombre}}</h1>
        </section>

@endsection
