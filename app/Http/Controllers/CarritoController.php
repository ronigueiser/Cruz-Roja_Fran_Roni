<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Curso;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{
    public function carritoLista()
    {
        $builder = Carrito::with(['curso']);
        $usuarios_carritos = $builder->get()->where('usuario_id', Auth::id());
        $cursos = Curso::all();
        $usuarios = Usuario::all();

        return view('carrito', [
            'usuarios_carritos' => $usuarios_carritos,
            'cursos' => $cursos,
            'usuarios' => $usuarios,
        ]);
    }
    public function carritoAgregar(Request $request)
    {
        $id_curso = $request->input('curso_id');
        $cursos = Curso::all();
        $usuarios = Usuario::all();

        return view('carrito', [
            'cursos' => $cursos,
            'usuarios' => $usuarios,
        ]);
    }

    public function nuevoGrabar(Request $request)
    {

        $usuarios_carrito = DB::table('carrito')->where('usuario_id', Auth::id());
        $carrito_id = $usuarios_carrito->value('carrito_id');

        $usuarios_items_carrito = DB::table('carrito')->where('usuario_id', Auth::id())->where('curso_id', $request->input(['curso_id']));
        $usuarios_items_compras = DB::table('compras')->where('usuario_id', Auth::id())->where('curso_id', $request->input(['curso_id']));
        $curso_usuario_carrito = $usuarios_items_carrito->value('curso_id');
        $curso_usuario_compra = $usuarios_items_compras->value('curso_id');

        $id = Auth::id();

        if ($curso_usuario_carrito) {
            return redirect()->route('ver-cursos')
                ->with('status.message', 'Ya agregaste este curso a tu carrito.')
                ->with('status.type', 'danger');
        } else if ($curso_usuario_compra) {
            return redirect()->route('ver-cursos')
                ->with('status.message', 'Ya adquiriste este curso. No podés volver a participar, pero no hay problema, ¡abrimos nuevos cursos todos los meses!')
                ->with('status.type', 'danger');
        } else {
            $data = [
                'carrito_id' => $carrito_id ? $carrito_id : substr(bin2hex(random_bytes(15)), 15),
                'curso_id' => $request->input(['curso_id']),
                'usuario_id' => Auth::id(),
            ];
            $carrito = Carrito::create($data);
            return redirect()->route('ver-cursos')
                ->with('status.message', 'El curso <b>' . e($carrito->nombre) . '</b> se agregó a tu carrito.')
                ->with('status.type', 'success');
        }

        // $data = array_push($data,);
        // TODO: crear validaciones para carrito
        // $request->validate(Curso::VALIDATE_RULES, Curso::VALIDATE_MESSAGES);


    }

    public function eliminarEjecutar($id)
    {
        $carrito = Carrito::findOrFail($id);

        $carrito->delete();

        return redirect()
            ->route('carrito')
            ->with('status.message', 'El curso <b>' . e($carrito->curso->nombre) . '</b> se eliminó de tu carrito')
            ->with('status.type', 'success');
    }
}
