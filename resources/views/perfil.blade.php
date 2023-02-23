@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Perfil')

@section('main')
<section class=" container">
    <h1 class="negrita py-3 d-inline-block">Perfil</h1><a
        href="{{route('perfil.editar.form', ['id' => $usuario->usuario_id])}}" class="btn btn-success ms-4 align-text-bottom"> <i
            class="fa-solid fa-pen-to-square pe-2"></i>Editar</a>
    <p>Usuario: {{$usuario->username ? $usuario->username : "Sin asignar"}}</p>
    <p>Correo: {{$usuario->email}}</p>


    <ul class="carrito-lista d-flex flex-column">
        @foreach ($usuarios_carritos as $usuario_carrito)
        <li class="card cont-item-carrito d-flex flex-row mb-4">
            @if ($usuario_carrito->curso->portada != null &&
            file_exists(public_path('img/'.$usuario_carrito->curso->portada)))
            <img src="{{url('img/'.$usuario_carrito->curso->portada)}}"
                alt="{{$usuario_carrito->curso->portada_descripcion}}">
            @else
            <img class="contain" src="{{url('img/cruz-roja.png')}}" alt="No hay foto para mostrar.">
            @endif
            <div class="card-body">
                <h2 class="negrita">{{$usuario_carrito->curso->nombre}}</h2>
                <p>{{$usuario_carrito->curso->descripcion}}</p>
                <p>Precio: <span class="negrita">${{$usuario_carrito->curso->precio}}</span></p>
                <form action="{{route('carrito.eliminar.ejecutar', ['id' =>$usuario_carrito -> item_carrito_id])}}"
                    method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
            {{-- <div class="card-footer">
                <a href="{{ url('/{{$curso->curso_id}}') }}" class="btn btn-success agregar-item-carrito"><i
                        class="fas fa-shopping-cart icono-carrito-btn"></i>Agregar al carrito</a>
            </div> --}}
        </li>
        @endforeach

    </ul>
    {{-- <ul class="catalogo-cursos">
        @foreach ($cursos as $curso)
        <li class="card cont-curso">
            @if ($curso->portada != null && file_exists(public_path('img/'.$curso->portada)))
            <img src="{{url('img/'.$curso->portada)}}" alt="{{$curso->portada_descripcion}}" class="card-img-top">
            @else
            <img class="contain card-img-top" src="{{url('img/cruz-roja.png')}}" alt="No hay foto para mostrar.">
            @endif
            <div class="card-body">
                <h2 class="negrita">{{$curso->nombre}}</h2>
                <p>{{$curso->descripcion}}</p>
                <p>Precio: <span class="negrita">${{$curso->precio}}</span></p>
            </div>
            <div class="card-footer">
                <form action="{{ route('carrito.agregar') }}" method="POST">
                    @csrf
                    <input hidden type="number" name="curso_id" id="curso_id" value={{$curso->curso_id}} />
                    <button type="submit" class="btn btn-success agregar-item-carrito"><i
                            class="fas fa-shopping-cart icono-carrito-btn"></i>Agregar al carrito</button>
                </form>
            </div>
        </li>
        @endforeach --}}

    </ul>
</section>

@endsection