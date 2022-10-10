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

        return view('admin-cursos', [
            'cursos' => $cursos,
        ]);
    }
}
