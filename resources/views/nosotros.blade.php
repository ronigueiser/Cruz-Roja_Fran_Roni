@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Nosotros')

@section('main')

    <section class="container py-4">
        <h1 class="negrita mb-5">Nosotros</h1>

        <div class="mb-5 card-nosotros">
            <h2>Acciones Humanitarias</h2>
            <p>Desarrollamos acciones humanitarias junto a las comunidades, promoviendo la reducción de riesgos y el
                desarrollo integral de las personas, construyendo y fortaleciendo las capacidades locales, fomentando la
                inclusión y participación de todos los grupos sin ninguna distinción o discriminación.</p>
        </div>
        <div class="mb-5 card-nosotros">
            <h2>Siempre Presentes</h2>
            <p>Desde Cruz Roja estamos presentes en cada gran emergencia, cuando ocurre el desastre y después, cuando
                los hechos dejan de ser noticia.</p>
        </div>
        <div class="mb-5 card-nosotros">
            <h2>Programas y Servicios</h2>
            <p>A través de nuestros distintos programas y servicios educativos, deseamos construir una sociedad más
                justa y más incluyente con los sectores en situación de vulnerabilidad, para que tengan acceso a fuentes
                de bienestar, seguridad e igualdad de oportunidades.</p>
        </div>

    </section>

@endsection