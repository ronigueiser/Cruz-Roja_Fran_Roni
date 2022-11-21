<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
            [
                'curso_id'=> 1,
                'nombre' => 'Tecnicatura superior en hemoterapia',
                'descripcion' => 'El/La Técnico/a Superior en Hemoterapia desarrollará su ejercicio como profesional en establecimientos de salud públicos o privados, obras sociales en todos los niveles de atención y programas sanitarios, sistema educativo de gestión pública y privada, organizaciones gubernamentales y no gubernamentales, establecimientos industriales, empresas, u otras organizaciones.',
                'precio' => 1000000,
                'clasificacion_id' => 2,
                'portada' => '20221121173632_tecnicatura-superior-en-hemoterapia.jpg',
                'portada_descripcion' => 'Adultos tomándose la presión',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id'=> 2,
                'nombre' => 'Reanimación cardiopulmonar',
                'descripcion' => 'La reanimación cardiopulmonar o RCP es una técnica básica de rescate que se pone en práctica cuando la respiración o los latidos de una persona se han detenido. Cuando se presenta una emergencia es importante que tanto los observadores sin capacitación como personal capacitado, comiencen con las labores de reanimación.',
                'precio' => 300000,
                'clasificacion_id' => 1,
                'portada' => '20221016195416_reanimacion-cardiopulmonar.jpg',
                'portada_descripcion' => 'Foto de adultos haciendo RCP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id'=> 3,
                'nombre' => 'Tecnicatura superior en instrumentación quirúrgica',
                'descripcion' => 'El/La Instrumentador/a Quirúrgico/a desarrollará su ejercicio como profesional en establecimientos de salud públicos o privados, obras sociales en todos los niveles de atención y programas sanitarios, sistema educativo de gestión pública y privada, organizaciones gubernamentales y no gubernamentales, establecimientos industriales, empresas u otras organizaciones.',
                'precio' => 1500000,
                'clasificacion_id' => 2,
                'portada' => '20221017002002_tecnicatura-superior-en-instrumentacion-quirurgica.jpg',
                'portada_descripcion' => 'Medicos en un quirófano',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id'=> 4,
                'nombre' => 'Guardavidas',
                'descripcion' => 'El/La Guardavidas es esencialmente un/a socorrista. Se podrá desempeñar en relación de dependencia y bajo supervisión de los organismos jurisdiccionales correspondientes, en natatorios, piscinas y piletas, en clubes, obras sociales, propiedades horizontales y casas de familia, en balnearios públicos y privados de las costas de lagos, lagunas, ríos y mar abierto.',
                'precio' => 500000,
                'clasificacion_id' => 1,
                'portada' => '20221017002115_guardavidas.jpg',
                'portada_descripcion' => 'Guardavidas en la playa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id'=> 5,
                'nombre' => 'Tecnicatura superior en enfermería',
                'descripcion' => 'El/La enfermero/a puede ejercer la profesión tanto en forma libre como autónoma o en relación de dependencia. Se puede desempeñar en gabinetes privados, en el domicilio de la persona, en locales, y en todos aquellos ámbitos gubernamentales y no gubernamentales acorde al marco legal vigente.',
                'precio' => 1500000,
                'clasificacion_id' => 2,
                'portada' => '20221017002140_tecnicatura-superior-en-enfermeria.jpg',
                'portada_descripcion' => 'Una enfermera formando un corazón con un estetoscopio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id'=> 6,
                'nombre' => 'Tecnicatura superior en laboratorio y análisis clínicos',
                'descripcion' => 'El/La Técnico/a Superior en Laboratorio de Análisis Clínicos es un profesional que puede desarrollarse en los siguientes ámbitos según el marco legal vigente y ejercer la profesión, tanto en forma libre y autónoma, como en relación de dependencia. Puede desempeñarse en laboratorios, instituciones y establecimientos de salud y educativas, establecimientos industriales, públicos y/o privados, y en todos aquellos ámbitos gubernamentales y no gubernamentales donde se requiera su desempeño acorde al marco legal vigente.',
                'precio' => 3500000,
                'clasificacion_id' => 2,
                'portada' => '20221017002211_tecnicatura-superior-en-laboratorio-y-analisis-clinicos.jpg',
                'portada_descripcion' => 'Médica con una pipeta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
