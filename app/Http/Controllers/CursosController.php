<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CursosController extends Controller
{
    public function cursos()
    {
        $cursos = Curso::all();
        $usuarios_carrito = DB::table('carrito')->where('usuario_id', Auth::id());
        $carrito_id = $usuarios_carrito->value('carrito_id');


        return view('cursos', [
            'cursos' => $cursos,
        ]);
    }
}
