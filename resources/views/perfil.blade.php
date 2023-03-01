@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Perfil')

@section('main')
<section class=" container">
    <h1 class="negrita py-3 d-inline-block">Perfil</h1><a
        href="{{route('perfil.editar.form', ['id' => $usuario->usuario_id])}}"
        class="btn btn-success ms-4 align-text-bottom"> <i class="fa-solid fa-pen-to-square pe-2"></i>Editar</a>
    <p>Usuario: {{$usuario->username ? $usuario->username : "Sin asignar"}}</p>
    <p>Correo: {{$usuario->email}}</p>

    <h2>Historial de compras</h2>


    @foreach ($manager->getItems() as $operacion => $datosOperacion)
    <p>Operación: {{$operacion}}</p>
    <p>Fecha de Compra: {{$datosOperacion["fechaOperacion"]}}</p>
    <table class="mb-3 table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nombre del Curso</th>
                <th>Lugar</th>
                <th>Fecha del Curso</th>
                <th>Hora</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datosOperacion["items"] as $item)
            <tr>
                <td>{{$item->nombre}}</td>
                <td>{{$item->lugar}}</td>
                <td>{{$item->fecha}}</td>
                <td>{{$item->hora}}</td>
                <td>${{$item->precio}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">Total</th>
                <td>${{$datosOperacion["totalPrice"]}}</td>
            </tr>
        </tfoot>
    </table>
    @endforeach
</section>

@endsection