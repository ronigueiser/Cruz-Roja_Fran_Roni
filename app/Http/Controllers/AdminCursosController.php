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

    public function nuevoGrabar(Request $request)
    {
        $data = $request->except(['_token']);

        //TODO Validar y subir la portada
        $request->validate([
            'nombre' => 'required|min:2',
            'descripcion' => 'required|min:10',
            'precio' => 'required|numeric|min:0',
        ], [
            'nombre.required' => 'El nombre no puede quedar vacío.',
            'nombre.min' => 'El nombre debe tener al menos :min caracteres.',
            'descripcion.required' => 'La descripcion no puede quedar vacía.',
            'descripcion.min' => 'La descripcion debe tener al menos :min caracteres.',
            'precio.required' => 'El precio no puede quedar vacío.',
            'precio.numeric' => 'El precio debe ser un número.',
            'precio.min' => 'El precio no puede ser negativo.',
        ]);

        Curso::create($data);

        return redirect()->route('admin.cursos.listado');
    }
}
