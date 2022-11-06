<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class AdminBlogController extends Controller
{
    public function index()
    {
        $comentarios = Blog::all();

        // dd($comentarios);

        return view('admin.blog.index', [
            'comentarios' => $comentarios,
        ]);
    }

    public function ver($id)
    {
        $comentario = Blog::findOrFail($id);

        return view('admin.blog.ver', [
            'comentario' => $comentario,
        ]);
    }

    public function eliminarConfirmar($id)
    {
        $comentario = Blog::findOrFail($id);

        return view('admin.blog.eliminar', [
            'comentario' => $comentario,
        ]);
    }

    public function eliminarEjecutar($id)
    {
        $comentario = Blog::findOrFail($id);

        $comentario->delete();

        return redirect()
            ->route('admin.comentarios.listado')
            ->with('status.message', 'El comentario se eliminó con éxito')
            ->with('status.type', 'success');
    }

    public function editarForm($id)
    {
        $comentario = Blog::findOrFail($id);

        return view('admin.blog.editar-form', [
            'comentario' => $comentario,
        ]);
    }

    public function editarEjecutar(Request $request, int $id)
    {
        $comentario = Blog::findOrFail($id);

        $data = $request->except(['_token']);
        
        $request->validate(Blog::VALIDATE_RULES, Blog::VALIDATE_MESSAGES);

        $comentario->update($data);

        return redirect()
            ->route('admin.comentarios.listado')
            ->with('status.message', 'El comentario se modificó con éxito')
            ->with('status.type', 'success');
    }

    public function nuevoForm()
    {
        return view('admin.blog.nuevo-form');
    }

    public function nuevoGrabar(Request $request)
    {
        $data = $request->except(['_token']);

        $request->validate(Blog::VALIDATE_RULES, Blog::VALIDATE_MESSAGES);

        $comentario = Blog::create($data);

        return redirect()->route('admin.comentarios.listado')
            ->with('status.message', 'El comentario se creó con éxito')
            ->with('status.type', 'success');
        ;
    }
}
