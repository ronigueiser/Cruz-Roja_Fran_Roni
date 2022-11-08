@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Confirmar Taller')

@section('main')
<section class=" container">
    <h1 class="negrita py-3">¿Completaste el taller inicial de primeros auxilios? ¡Es gratis!</h1>
    <p>Todos los cursos pagos requieren haber participado del taller inicial de primeros auxilios de Cruz Roja. Si aún no participaste, contactate con nosotros para saber cómo completarlo.</p>
    <form action="{{route('confirmar-taller-completo.ejecutar')}}" method="POST">
        @csrf
        <a href="{{route('contacto')}}" class="btn btn-danger">No completé el taller, ¡Quiero contactarme!</a>
        <button type="submit" class="btn btn-primary">Sí, completé el taller</button>
    </form>
</section>

@endsection