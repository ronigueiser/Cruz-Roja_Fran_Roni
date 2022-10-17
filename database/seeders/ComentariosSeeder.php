<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComentariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comentarios')->insert([
            [
                'comentario_id'=> 1,
                'usuario' => 'Norma Catepuzzi',
                'curso' => 'Guardavidas',
                'comentario' => 'Hola, mi nombre es Norma. Dejo mis comentarios sobre el curso de Guardavidas para recomendarlo.
                Era algo muy necesario en mi vida ya que mi hija le temía al agua por su condición de salud y yo
                quería mostrarle que no tenía nada de que temer si me tenía al lado. Es por eso que me anote en
                este curso y ahora podemos viajar a la costa en familia y disfrutar de la playa, sabiendo que ante
                cualquier inconveniente ya estoy capacitada para responder.',
            ],
            [
                'comentario_id'=> 2,
                'usuario' => 'Matias Traverso',
                'curso' => 'Tecnicatura superior en enfermería',
                'comentario' => 'Soy Matias, recomiendo este curso para buscar salida laboral. Con este curso pude conseguir trabajo
                en una clínica privada. Además de eso, me quedo muy conforme con el curso ya que aprendimos cosas
                como evaluar el estado de salud de la persona sana o enferma en todas las etapas del ciclo vital,
                diagnosticar sus problemas, planificar e implementar acciones tendientes a solucionarlos y valorar
                los resultados. Las clases son muy dinámicas y con compañeros excelentes que me hacen querer volver
                y aprender otras cosas.',
            ],
            [
                'comentario_id'=> 3,
                'usuario' => 'Tao Lin',
                'curso' => 'Reanimación cardiopulmonar',
                'comentario' => 'Mi nombre es Tao Lin, hice el curso de RCP para adultos y quedé muy contento. Mi familia viene desde Corea del Sur
                y nos asentamos en la comunidad que tiene en Argentina hace 6 meses. Al ser pocos y no muchos que hablan el idioma,
                me pareció una buena idea tener el conocimiento básico de RCP ya que contamos con mucha gente mayor que quizás
                necesita una ayuda más inmediata hasta que podemos contactarnos con un hospital. Por el momento no tuve que usar
                las técnicas aprendidas, pero me siento mucho más seguro con mi comunidad sabiendo que se cómo actuar ante cualquier situación.',
            ],
            [
                'comentario_id'=> 4,
                'usuario' => 'Sofia Tacupi del Carmen',
                'curso' => 'Reanimación cardiopulmonar',
                'comentario' => 'Hola comunidad, mi nombre es Sofía y les escribo para dejar mi reseña sobre el curso de RCP. La verdad es que lo único que tengo
                para decir es que está buenísimo. Aprendí un montón junto a mis compañeras, que de casualidad éramos todas maestras jardineras y
                hacíamos este curso con el fin de tener un conocimiento formal de cómo ayudar a los chicos ante una situación de urgencia médica.
                Las clases muy informativas y prácticas, lo cual es importante para saber cómo actuar. Les mando un saludo a mis compañeras del curso
                que nos unimos un montón y espero poder estar presente en otros cursos para seguir mejorando mis conocimientos.',
            ],
        ]);
    }
}
