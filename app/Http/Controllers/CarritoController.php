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
        $usuarios_carritos = $builder->get()->where('usuario_id', 2);
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

        $id = Auth::id();
        $data = [
            'carrito_id' => $carrito_id ? $carrito_id : substr(bin2hex(random_bytes(15)), 15),
            'curso_id' => $request->input(['curso_id']),
            'usuario_id' => Auth::id(),
        ];
         
        // $data = array_push($data,);
        // TODO: crear validaciones para carrito
        // $request->validate(Curso::VALIDATE_RULES, Curso::VALIDATE_MESSAGES);

        $carrito = Carrito::create($data);

        return redirect()->route('admin.cursos.listado')
            ->with('status.message', 'El curso <b>' . e($carrito->nombre) . '</b> se creó con éxito')
            ->with('status.type', 'success');
        ;
    }
}
