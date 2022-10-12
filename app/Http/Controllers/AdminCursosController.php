<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class AdminCursosController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();

        // dd($cursos);

        return view('admin.cursos.index', [
            'cursos' => $cursos,
        ]);
    }

    public function nuevoForm()
    {
        return view('admin.cursos.nuevo-form');
    }

    public function nuevoGrabar()
    {
        echo "Hola :D";
    }
}
