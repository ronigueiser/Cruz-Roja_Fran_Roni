<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursosController extends Controller
{
    public function cursos()
    {
        $cursos = Curso::all();

        return view('cursos', [
            'cursos' => $cursos,
        ]);
    }
}
