@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Contacto')

@section('main')
<main>
    <section class="container py-4">
        <h1 class="negrita mb-5">Contacto</h1>

        <div class="mb-5 card-contacto">
            <h2 class="negrita">Numero de teléfono</h2>
            <span>+54 11 6065-0450</span>
        </div>
        <div class="mb-5 card-contacto">
            <h2 class="negrita">Mail</h2>
            <span>info@cruzroja.org.ar</span>
        </div>
        <div class="mb-5 card-contacto">
            <h2 class="negrita">Dirección</h2>
            <span>Hipólito Yrigoyen 2070, Ciudad Autónoma de Bs. As.</span>
        </div>

    </section>
</main>
@endsection