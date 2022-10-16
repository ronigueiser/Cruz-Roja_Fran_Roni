<?php

namespace App\Http\Controllers;

use App\Models\Curso;

class HomeController extends Controller
{
    public function home ()
    {
        //Retornamos el contenido de la vista "welcome", con ayuda de la funcion helper "view()"
        /*
         * La funcion "view()" busca un archivo ".php" o ".blade.php" en la carpeta [resources/views]
         */


        $cursos = Curso::all();

        // dd($cursos);

        return view('welcome', [
            'cursos' => $cursos,
        ]);

    }
}
