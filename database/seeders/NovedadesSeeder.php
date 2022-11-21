<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NovedadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('novedades')->insert([
            [
                'novedad_id' => 1,
                'titulo' => 'Charlas Informativas',
                'curso_id' => 2,
                'detalle' => 'Se asistió a la Escuela Técnica ORT, donde pudimos dar clases de reanimación cardiopulmonar (RCP) a los alumnos de último año. Un ejercicio práctico con su teoría para que los chicos entiendan la importancia de tener estos conocimientos en momentos críticos.',
                'portada' => '20221121173027_charlas-informativas.jpg',
                'portada_descripcion' => 'Charla en escuela de Cruz Roja',
            ],
            [
                'novedad_id' => 2,
                'titulo' => 'Viaje Grupal a la Costa',
                'curso_id' => 4,
                'detalle' => 'Se organizó un viaje de 3 días a la costa argentina para poner en práctica lo aprendido en el curso. Tuvimos la oportunidad de estar presente en las playas de Miramar donde realizamos entrenamientos, prácticas y charlas con los guardavidas de la zona. Una actividad para disfrutar y aprender de la mejor manera.',
                'portada' => '20221121173409_viaje-grupal-a-la-costa.jpg',
                'portada_descripcion' => 'Voluntarios de Cruz Roja entrenando en la playa para Guardavidas',
            ],
            [
                'novedad_id' => 3,
                'titulo' => 'Experiencias Personales',
                'curso_id' => 5,
                'detalle' => 'Tuvimos la oportunidad de hablar con enfermeros voluntariados que viajaron a la zona de ucrania para ayudar a las víctimas de los ataques rusos. Nos cuentan su experiencia trabajando en altas revoluciones, la importancia de atender y dar un primer diagnóstico sobre el estado de salud para poder derivarlo a un hospital o medico capacitado.',
                'portada' => '20221121173917_experiencias-personales.jpg',
                'portada_descripcion' => 'Reunión de Cruz Roja con una enfermera',
            ],
            [
                'novedad_id' => 4,
                'titulo' => 'Experiencia Laboral',
                'curso_id' => 3,
                'detalle' => 'Gracias a nuestra amplia red de contactos, tuvimos la suerte de poder ser parte de una operación en el hospital Trinidad de San Isidro, donde los alumnos de la Tecnicatura superior en instrumentación quirúrgica pudieron ver cómo trabaja un profesional a la hora de preparar una operación.',
                'portada' => '20221121174317_experiencia-laboral.jpg',
                'portada_descripcion' => 'Voluntarios ingresando elementos a un hospital para preparar una cirugía',
            ],
        ]);
    }
}
