@extends('layouts.admin') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Ver usuario')

@section('main')
<section class="container d-flex flex-column my-4 mb-4">
    <div class="cont-det-curso">
        <h1 class="negrita">Datos del usuario</h1>
        <p>Email: {{$usuario->email}}</p>
        <p>Nombre de usuario: {{$usuario->username}}</p>
        <h2 class="mt-5">Historial de compras</h2>
        @if (empty($manager->getItems()))
        <p>El usuario aún no se inscribió a ningún curso.</p>
        @else

        @foreach ($manager->getItems() as $operacion => $datosOperacion)
        <div class="operacion-cont mb-3 ">
            <p>Operación: {{$operacion}}</p>
            <p>Fecha de Compra: {{$datosOperacion["fechaOperacion"]}}</p>
            <table class="table table-striped table-bordered">
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
        </div>
        @endforeach
        @endif

    </div>



    <a class="" aria-current="page" href="{{url('admin/usuarios')}}">Volver </a>
</section>

@endsection