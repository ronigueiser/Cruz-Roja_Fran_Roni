<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ConfirmarTallerCompletoController extends Controller
{
    public function confirmarForm()
    {
        return view('confirmar-taller');
    }

    public function confirmarEjecutar()
    {
        Session::put('tallerCompleto', true);

        return redirect()
            ->route('ver-cursos')
            ->with('status.message', 'Confirmaste que participaste en el taller inicial de primeros auxilios.')
            ->with('status.type', 'success');
    }
}
