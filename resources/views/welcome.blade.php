{{--

@extends(path)
Path debe ser la ruta, a partir de [resources/views]
Debemos aclarar en que espacio "cedido" por el template queremos ubicar el contenido, esto se logra con:
@section('name') y @endsection


--}}

@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Pagina Principal')

@section('main')
<section class="container">

    <section class="d-flex cont-1">
        <div>
            <h1 class="cr-title">Cruz Roja Argentina</h1>
        </div>
        <div>
            <p>Somos una asociación civil, humanitaria y de carácter voluntario, con presencia en el territorio
                argentino, y
                parte integrante del
                Movimiento Internacional de la Cruz Roja y de la Media Luna Roja, la red humanitaria más grande del
                mundo
                presente en 191 países.
                Capacitamos en Primeros Auxilios a más de 50.000 personas por año en el país y brindamos cobertura a los
                asistentes en eventos masivos.</p>
        </div>
    </section>

    <h2 class="negrita">Nuestros valores</h2>
    <section class="cont-valores">


        <div class="item-valores">
            <h3>Acciones Humanitarias</h3>

            <p>
                Desarrollamos acciones humanitarias junto a las comunidades, promoviendo la reducción de riesgos y el
                desarrollo integral de las personas,
                construyendo y fortaleciendo las capacidades locales, fomentando la inclusión y participación de todos
                los
                grupos sin ninguna distinción o discriminación.
            </p>
        </div>

        <div class="item-valores">
            <h3>Siempre Presentes</h3>

            <p>Desde Cruz Roja estamos presentes en cada gran emergencia, cuando ocurre el desastre y después, cuando
                los
                hechos dejan de ser noticia.</p>
        </div>

        <div class="item-valores">
            <h3>Programas y Servicios</h3>
            <p>A través de nuestros distintos programas y servicios educativos, deseamos construir una sociedad más
                justa y
                más incluyente con los sectores en
                situación de vulnerabilidad, para que tengan acceso a fuentes de bienestar, seguridad e igualdad de
                oportunidades.</p>
        </div>


        <div class="item-valores">
            <h3>Cruz Roja siempre está</h3>
            <p>
                En todo momento, a través de nuestras 66 filiales, acompañamos al crecimiento de las comunidades
                fortaleciendo la resiliencia y promoviendo
                la planificación para estar mejor preparados ante emergencias y desastres.
            </p>
        </div>

        <div class="item-valores">
            <h3>Trabajando juntos</h3>
            <p>
                Trabajamos en la promoción de la salud y el desarrollo comunitario, reforzando la prevención de
                enfermedades
                prevalentes, y la reducción de
                la vulnerabilidad del VIH desde un enfoque de promoción de derechos, de género y de diversidad.
            </p>
        </div>



    </section>

    <section class="cont-cursos-home d-flex flex-column">
        <h2>Cursos</h2>

        <p>Desde Cruz Roja nos enfocamos en agrandar nuestra comunidad y tener más gente con conocimiento en las calles,
            para que ante cualquier problema haya gente que pueda ayudar a los demás con la capacitación necesaria para
            responder.
        </p>
        <p>Tenemos distintos cursos en los que te podés inscribir y así ser parte de un movimiento que prioriza la salud
            y bienestar de los demás
        </p>


        <a href="{{url('cursos')}}" class="btn btn-ver-cursos">Ver cursos</a>
    </section>
</section>
    @endsection
