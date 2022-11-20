
@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Ver curso')

@section('main')
        <section class="container d-flex flex-column my-4 mb-4">
            <div class="cont-det-curso">

{{--                <pre>{{$usuario}}</pre>--}}

                <h1 class="negrita">{{$usuario->email}}</h1>

                <h2>Curso contratado:</h2>
                <img class="curso-det-img" src="{{url('img/'.$usuario->curso->portada)}}" alt="{{$usuario->curso->portada_descripcion}}">

{{--                <p><span class="negrita">Rol:</span> {{$usuario->role->nombre}}</p>--}}



                <h3>{{$usuario->curso->nombre}}</h3>
                <p><span class="negrita">Precio:</span> ${{$usuario->curso->precio}}</p>
                <p>{{$usuario->curso->descripcion}}</p>
            </div>



            <a class="" aria-current="page" href="{{url('admin/usuarios')}}">Volver </a>
        </section>

@endsection
