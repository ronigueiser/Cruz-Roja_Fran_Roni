<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cruz Roja</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link rel="stylesheet" href="<?= url('css/estilos.css'); ?>">

</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= url('/') ?>">Cruz Roja</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= url('/'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= url('cursos'); ?>">Cursos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= url('nosotros'); ?>">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= url('admin/cursos'); ?>">Administrar Cursos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container py-4">
            <section class="row">

                <div class="col-9">
                    <h1>Cruz Roja Argentina</h1>

                    <p>Somos una asociación civil, humanitaria y de carácter voluntario, con presencia en el territorio argentino, y parte integrante del
                        Movimiento Internacional de la Cruz Roja y de la Media Luna Roja, la red humanitaria más grande del mundo presente en 191 países.
                        Capacitamos en Primeros Auxilios a más de 50.000 personas por año en el país y brindamos cobertura a los asistentes en eventos masivos.</p>
                </div>


                <div class="col-4">
                    <h2>Acciones Humanitarias</h2>

                    <p>
                        Desarrollamos acciones humanitarias junto a las comunidades, promoviendo la reducción de riesgos y el desarrollo integral de las personas,
                        construyendo y fortaleciendo las capacidades locales, fomentando la inclusión y participación de todos los grupos sin ninguna distinción o discriminación.
                    </p>
                </div>

                <div class="col-4">
                    <h2>Siempre Presentes</h2>

                    <p>Desde Cruz Roja estamos presentes en cada gran emergencia, cuando ocurre el desastre y después, cuando los hechos dejan de ser noticia.</p>
                </div>

                <div class="col-4">
                    <h2>Programas y Servicios</h2>
                    <p>A través de nuestros distintos programas y servicios educativos, deseamos construir una sociedad más justa y más incluyente con los sectores en
                        situación de vulnerabilidad, para que tengan acceso a fuentes de bienestar, seguridad e igualdad de oportunidades.</p>
                </div>




            </section>
        </main>

        <footer class="footer">
            <p>Francisco Andreo y Roni Gueiser</p>
        </footer>
    </div>
</body>
</html>
