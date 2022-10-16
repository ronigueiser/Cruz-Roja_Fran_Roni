
@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Ver curso')

@section('main')
        <section class="row">
            <div class="col-6">
                <h1>{{$curso->nombre}}</h1>

                <p><b>Precio:</b> ${{$curso->precio}}</p>

                <h2>Descripcion del producto</h2>
                <p>{{$curso->descripcion}}</p>
            </div>

            @if ($curso->portada != null && file_exists(public_path('img/'.$curso->portada)))
                <img src="{{url('img/'.$curso->portada)}}" alt="{{$curso->portada_descripcion}}">
            @else
                <p>*No existe una imagen para este curso</p>
            @endif

            <a class="" aria-current="page" href="{{url('admin/cursos')}}">Volver </a>
        </section>

@endsection
