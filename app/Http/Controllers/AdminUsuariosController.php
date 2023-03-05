<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\AbstractPaginator;
use App\Models\Usuario;
use App\Models\Curso;
use App\Models\Compra;
use App\Models\Role;
use App\Compras\ComprasManager;

class AdminUsuariosController extends Controller
{
    public function index(Request $request)
    {
        $builder = Usuario::with(['curso', 'role']);

        $buscarParams = [
            'email' => $request->query('email', null),
        ];
        if($buscarParams['email']) {
            $builder->where('email', 'LIKE', '%' . $buscarParams['email']. '%');
        }
        $usuarios = $builder->paginate(4)->withQueryString(); //NO ES UN ERROR, EL IDE DICE QUE NO EXISTE PERO FUNCIONA PERFECTO, NO BORRAR

        return view('admin.usuarios.index', [
            'usuarios' => $usuarios,
            'buscarParams' => $buscarParams,
        ]);
    }

    public function ver($id)
    {
        $builder = Compra::with(['curso']);
        $usuarios_compras = $builder->orderBy('created_at', 'DESC')->get()->where('usuario_id', $id)->groupBy('mp_payment_id');

        $manager = new ComprasManager();
        $manager->setItems($usuarios_compras);

        $usuario = Usuario::findOrFail($id);

        return view('admin.usuarios.ver', [
            'usuario' => $usuario,
            'manager' => $manager,
        ]);
    }

    public function eliminarConfirmar($id)
    {
        $usuario = Usuario::findOrFail($id);

        return view('admin.usuarios.eliminar', [
            'usuario' => $usuario,
        ]);
    }

    public function eliminarEjecutar($id)
    {
        $usuario = Usuario::findOrFail($id);

        $usuario->delete();

        return redirect()
            ->route('admin.usuarios.listado')
            ->with('status.message', 'El usuario <b>' . e($usuario->email) . '</b> se eliminó con éxito')
            ->with('status.type', 'success');
    }

    public function editarForm($id)
    {
        $usuario = Usuario::findOrFail($id);

        return view('admin.usuarios.editar-form', [
            'usuario' => $usuario,
            'curso' => Curso::get(),
            'role' => Role::get(),
        ]);
    }

    public function editarEjecutar(Request $request, int $id)
    {
        $usuario = Usuario::findOrFail($id);

        $data = $request->except(['_token']);

        $request->validate(Usuario::VALIDATE_RULES, Usuario::VALIDATE_MESSAGES);


        $usuario->update($data);


        return redirect()
            ->route('admin.usuarios.listado')
            ->with('status.message', 'El usuario <b>' . e($usuario->email) . '</b> se modificó con éxito')
            ->with('status.type', 'success');
    }

    public function nuevoForm()
    {
        return view('admin.usuarios.nuevo-form', [
            'cursos' => Curso::get(),
            'roles' => Role::get(),
        ]);
    }

    public function nuevoGrabar(Request $request)
    {
        $data = $request->except(['_token']);

        $request->validate(Usuario::VALIDATE_RULES, Usuario::VALIDATE_MESSAGES);

        $usuario = Usuario::create($data);

        return redirect()->route('admin.usuarios.listado')
            ->with('status.message', 'El usuario <b>' . e($usuario->email) . '</b> se creó con éxito')
            ->with('status.type', 'success');
        ;
    }
}
