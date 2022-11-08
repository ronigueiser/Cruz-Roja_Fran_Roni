@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Confirmar Edad')

@section('main')
<section class=" container">
    <h1 class="negrita py-3">Se necesita confirmación</h1>
    <p>Para poder continuar, debés confirmar que sos mayor de edad.</p>
    <form action="{{route('confirmar-mayoria-edad.ejecutar')}}" method="POST">
        @csrf
        <a href="{{route('home')}}" class="btn btn-danger">No soy mayor de 18 años</a>
        <button type="submit" class="btn btn-primary">Soy mayor de 18 años</button>
    </form>
</section>

@endsection