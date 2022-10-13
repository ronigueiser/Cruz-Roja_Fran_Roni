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

    public function ver($id)
    {
        $curso = Curso::findOrFail($id);

        return view('admin.cursos.ver', [
            'curso' => $curso,
        ]);
    }

    public function eliminarConfirmar($id)
    {
        $curso = Curso::findOrFail($id);

        return view('admin.cursos.eliminar', [
            'curso' => $curso,
        ]);
    }

    public function eliminarEjecutar($id)
    {
        $curso = Curso::findOrFail($id);

        $curso->delete();

        return redirect()
            ->route('admin.cursos.listado')
            ->with('status.message', 'El curso <b>' . e($curso->nombre) . '</b> se eliminó con éxito')
            ->with('status.type', 'success');
    }

    public function editarForm($id)
    {
        $curso = Curso::findOrFail($id);

        return view('admin.cursos.editar-form', [
            'curso' => $curso,
        ]);
    }

    public function editarEjecutar(Request $request, int $id)
    {
        $curso = Curso::findOrFail($id);

        $data = $request->except(['_token']);
        
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
        $curso->update($data);

        //TODO Portada

        return redirect()
            ->route('admin.cursos.listado')
            ->with('status.message', 'El curso <b>' . e($curso->nombre) . '</b> se modificó con éxito')
            ->with('status.type', 'success');
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

        $curso = Curso::create($data);

        return redirect()->route('admin.cursos.listado')
            ->with('status.message', 'El curso <b>' . e($curso->nombre) . '</b> se creó con éxito')
            ->with('status.type', 'success');
        ;
    }
}
