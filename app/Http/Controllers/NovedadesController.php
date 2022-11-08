<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novedad;

class NovedadesController extends Controller
{
    public function index()
    {
        $novedades = Novedad::all();

        return view('novedades', [
            'novedades' => $novedades,
        ]);
    }
}
