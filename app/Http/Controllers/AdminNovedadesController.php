<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Novedad;

class AdminNovedadesController extends Controller
{
    public function index(Request $request)
    {
        $builder = Novedad::with(['curso']);

        $buscarParams = [
            'curso_id' => $request->query('curso_id', null),
        ];
        if($buscarParams['curso_id']) {
            $builder->where('curso_id', 'LIKE', '%' . $buscarParams['curso_id']. '%');
        }
        $novedades = $builder->paginate(4)->withQueryString(); //NO ES UN ERROR, EL IDE DICE QUE NO EXISTE PERO FUNCIONA PERFECTO, NO BORRAR

        return view('admin.novedades.index', [
            'novedades' => $novedades,
            'buscarParams' => $buscarParams,
        ]);
    }

    public function ver($id)
    {
        $novedad = Novedad::findOrFail($id);

        return view('admin.novedades.ver', [
            'novedad' => $novedad,
        ]);
    }

    public function eliminarConfirmar($id)
    {
        $novedad = Novedad::findOrFail($id);

        return view('admin.novedades.eliminar', [
            'novedad' => $novedad,
        ]);
    }

    public function eliminarEjecutar($id)
    {
        $novedad = Novedad::findOrFail($id);

        $novedad->delete();

        return redirect()
            ->route('admin.novedades.listado')
            ->with('status.message', 'La novedad se eliminó con éxito')
            ->with('status.type', 'success');
    }

    public function editarForm($id)
    {
        $novedad = Novedad::findOrFail($id);

        return view('admin.novedades.editar-form', [
            'novedad' => $novedad,
            'cursos' => Curso::get(),
        ]);
    }

    public function editarEjecutar(Request $request, int $id)
    {
        $novedad = Novedad::findOrFail($id);

        $data = $request->except(['_token']);
        
        $request->validate(Novedad::VALIDATE_RULES, Novedad::VALIDATE_MESSAGES);

        $novedad->update($data);

        return redirect()
            ->route('admin.novedades.listado')
            ->with('status.message', 'La novedad se modificó con éxito')
            ->with('status.type', 'success');
    }

    public function nuevoForm()
    {
        return view('admin.novedades.nuevo-form', [
            'cursos' => Curso::get(),
        ]);
    }

    public function nuevoGrabar(Request $request)
    {
        $data = $request->except(['_token']);

        $request->validate(Novedad::VALIDATE_RULES, Novedad::VALIDATE_MESSAGES);

        $novedad = Novedad::create($data);

        return redirect()->route('admin.novedades.listado')
            ->with('status.message', 'La novedad se creó con éxito')
            ->with('status.type', 'success');
        ;
    }
}
