
@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Ver curso')

@section('main')
        <section class="row">
            <h1>{{$curso->nombre}}</h1>
        </section>

@endsection
