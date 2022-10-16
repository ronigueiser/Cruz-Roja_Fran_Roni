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

    <nav class="navbar navbar-expand-lg navbar-base">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/')}}">Cruz Roja</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('cursos')}}">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('blog')}}">Blog</a>
                    </li>

{{--                    @if(Auth::check())--}}
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.cursos.listado')}}">Panel</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{route('auth.logout')}}" method="post">
                                @csrf
                                <button type="submit" class="btn nav-link">Cerrar Sesion</button>
                            </form>
                        </li>
{{--                        @else--}}
                    @elseguest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.login.form') }}">Iniciar Sesion</a>
                    </li>
{{--                        @endif--}}
                        @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4">

        @if (Session::has('status.message'))
            <div class="alert alert-{{Session::get('status.type') ?? 'info'}}">{!!Session::get('status.message')!!}</div>
        @endif
       @yield('main')
    </main>

    <footer class="footer">
        <p>Francisco Andreo y Roni Gueiser</p>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
