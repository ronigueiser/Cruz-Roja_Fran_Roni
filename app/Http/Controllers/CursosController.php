<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CursosController extends Controller
{
    public function cursos()
    {
        $cursos = Curso::all();

        $usuarios_carrito = Carrito::where('usuario_id', Auth::id())->get('curso_id');
        $carrito_ids = [];
        
        foreach($usuarios_carrito as $carrito_id) {

            array_push($carrito_ids, $carrito_id['curso_id']);
        }

        $usuarios_compras = Compra::where('usuario_id', Auth::id())->get('curso_id');
        $compra_ids = [];

        foreach($usuarios_compras as $compra_id) {

            array_push($compra_ids, $compra_id['curso_id']);
        }


        return view('cursos', [
            'cursos' => $cursos,
            'carrito_ids' => $carrito_ids,
            'compra_ids' => $compra_ids,
        ]);
    }
}
