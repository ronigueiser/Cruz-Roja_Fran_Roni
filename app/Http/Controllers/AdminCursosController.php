<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Clasificacion;

class AdminCursosController extends Controller
{
    public function index()
    {
        $cursos = Curso::with(['clasificacion'])->get();

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
            'clasificaciones' => Clasificacion::get(),
        ]);
    }

    public function editarEjecutar(Request $request, int $id)
    {
        $curso = Curso::findOrFail($id);

        $data = $request->except(['_token']);
        
        $request->validate(Curso::VALIDATE_RULES, Curso::VALIDATE_MESSAGES);

        if($request->hasFile('portada')) {
            $portada = $request->file('portada');

            $nombrePortada = date('YmdHis') . '_' . \Str::slug($data['nombre']) . '.' . $portada->clientExtension();

            $portada->move(public_path('img'), $nombrePortada);

            $data['portada'] = $nombrePortada;
            $portadaVieja = $curso->portada;
        }

        $curso->update($data);

        if($portadaVieja ?? false) {
            unlink(public_path('img/' . $portadaVieja));
        }

        return redirect()
            ->route('admin.cursos.listado')
            ->with('status.message', 'El curso <b>' . e($curso->nombre) . '</b> se modificó con éxito')
            ->with('status.type', 'success');
    }

    public function nuevoForm()
    {
        return view('admin.cursos.nuevo-form', [
            'clasificaciones' => Clasificacion::get(),
        ]);
    }

    public function nuevoGrabar(Request $request)
    {
        $data = $request->except(['_token']);

        $request->validate(Curso::VALIDATE_RULES, Curso::VALIDATE_MESSAGES);

        if($request->hasFile('portada')) {
            $portada = $request->file('portada');

            $nombrePortada = date('YmdHis') . '_' . \Str::slug($data['nombre']) . '.' . $portada->clientExtension();

            $portada->move(public_path('img'), $nombrePortada);

            $data['portada'] = $nombrePortada;
        }

        $curso = Curso::create($data);

        return redirect()->route('admin.cursos.listado')
            ->with('status.message', 'El curso <b>' . e($curso->nombre) . '</b> se creó con éxito')
            ->with('status.type', 'success');
        ;
    }
}
