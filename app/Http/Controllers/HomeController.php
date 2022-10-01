<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function home ()
    {
        //Retornamos el contenido de la vista "welcome", con ayuda de la funcion helper "view()"
        /*
         * La funcion "view()" busca un archivo ".php" o ".blade.php" en la carpeta [resources/views]
         */

        return view('welcome');
    }
}
