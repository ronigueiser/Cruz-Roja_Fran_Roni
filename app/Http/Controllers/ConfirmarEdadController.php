<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ConfirmarEdadController extends Controller
{
    public function confirmarForm()
    {
        return view('confirmar-edad');
    }

    public function confirmarEjecutar()
    {
        Session::put('mayorDeEdad', true);

        return redirect()
            ->route('admin.cursos.listado')
            ->with('status.message', 'Confirmaste que sos mayor de edad.')
            ->with('status.type', 'success');
    }
}
