{{--
    Este archivo funciona como nuestro template de base
--}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>


    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{url('css/estilos.css')}}">

</head>
<body>
<div id="app">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/')}}">Administrador ~ Cruz Roja</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/')}}">Volver a la Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('admin/cursos')}}">Panel de Administrador</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        @if (Session::has('status.message'))
            <div class="alert alert-{{Session::get('status.type') ?? 'info'}}">{!!Session::get('status.message')!!}</div>
        @endif
        <section>
            @yield('main')
        </section>
    </main>

    <footer class="footer">
        <p>Francisco Andreo y Roni Gueiser</p>
    </footer>
</div>
</body>
</html>
