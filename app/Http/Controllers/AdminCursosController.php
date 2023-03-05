<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\AbstractPaginator;
use App\Models\Curso;
use App\Models\Clasificacion;
use App\Models\Compra;
use Illuminate\Support\Facades\DB;


class AdminCursosController extends Controller
{
    public function index(Request $request)
    {
        $builder = Curso::with(['clasificacion']);

        $buscarParams = [
            'nombre' => $request->query('nombre', null),
        ];
        if($buscarParams['nombre']) {
            $builder->where('nombre', 'LIKE', '%' . $buscarParams['nombre']. '%');
        }
        $cursos = $builder->paginate(4)->withQueryString(); //NO ES UN ERROR, EL IDE DICE QUE NO EXISTE PERO FUNCIONA PERFECTO, NO BORRAR

        return view('admin.cursos.index', [
            'cursos' => $cursos,
            'buscarParams' => $buscarParams,
        ]);
    }

    public function dashboard(){

        $compras = Compra::with('precio')->sum('precio');
        $cantidad = Compra::with('precio')->count('precio');

        $curso_mas_comprado = DB::table('compras')
            ->select('curso_id', DB::raw('count(*) as total'))
            ->groupBy('curso_id')
            ->orderByDesc('total')
            ->limit(1)
            ->first();


//        print_r($curso_mas_comprado->curso_id);

        $curso = Curso::findOrFail($curso_mas_comprado->curso_id);

        return view('admin.cursos.dashboard', [
            'compras' => $compras,
            'cantidad' => $cantidad,
            'ventas' => $curso_mas_comprado,
            'curso' => $curso

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
