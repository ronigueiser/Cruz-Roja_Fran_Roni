<?php
/**
 *@var \Illuminate\Database\Eloquent\Collection\App\Models\Compra[] $compras
 */

?>
@extends('layouts.admin') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Dashboard')

@section('main')
    <section class="container py-4 cont-admin">
        <h1 class="negrita">Dashboard</h1>

        <p class="d-inline-block btn-nuevo btn btn-primary">
            <a class="btn-primary" aria-current="page" href="{{url('admin/cursos')}}">Volver </a>
        </p>


        <div class="">
            <h2>Ingresos por ventas</h2>
            <p>El total obtenido por las ventas de cursos es: ${{$compras}}</p>
        </div>

        <div class="">
            <h2>Cantidad de ventas</h2>
            <p>En total se vendieron: {{$cantidad}} cursos</p>

        </div>

        <div class="">
            <h2>Mejor curso</h2>
            <p>El curso mas vendido es: {{$curso->nombre}}</p>
            <p>Cantidad de ventas del curso: {{$ventas->total}} veces</p>

        </div>

{{--                    @foreach ($items as $item)--}}

{{--        <ul>--}}
{{--            <li>{{$item}}</li>--}}
{{--        </ul>--}}
{{--            @endforeach--}}

    </section>

@endsection
