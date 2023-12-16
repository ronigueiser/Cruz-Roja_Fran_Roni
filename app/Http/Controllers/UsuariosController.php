<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Carrito;
use App\Compras\ComprasManager;
use App\Http\Requests\StoreusuariosRequest;
use App\Http\Requests\UpdateusuariosRequest;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{

    public function verPerfil()
    {
        $builder = Carrito::with(['curso']);
        $usuarios_carritos = $builder->get()->where('usuario_id', Auth::id());
//        $builder = Compra::with(['curso']);
//        $usuarios_compras = $builder->orderBy('created_at', 'DESC')->get()->where('usuario_id', Auth::id())->groupBy('mp_payment_id');

        $usuarios_compras = Compra::where('usuario_id', Auth::id())
            ->orderBy('created_at', 'DESC')
            ->get()
            ->groupBy('mp_payment_id');
        $total_compras = $usuarios_compras->sum('precio');
        $usuario = Usuario::findOrFail(Auth::id());

        $manager = new ComprasManager();
        $manager->setItems($usuarios_compras);

        return view('perfil', [
            'manager' => $manager,
            'usuarios_carritos' => $usuarios_carritos,
            'usuarios_compras' => $usuarios_compras,
            'total_compras' => $total_compras,
            'usuario' => $usuario,
        ]);
    }

    public function editarForm($id)
    {
        $usuario = Usuario::findOrFail(Auth::id());

        return view('perfil-editar-form', [
            'usuario' => $usuario,
        ]);
    }

    public function editarEjecutar(Request $request, int $id)
    {
        $usuario = Usuario::findOrFail($id);

        $data = $request->except(['_token']);

        $request->validate(Usuario::VALIDATE_RULES_EDIT, Usuario::VALIDATE_MESSAGES);


        $usuario->update($data);

        return redirect()
            ->route('perfil')
            ->with('status.message', 'Tu perfil se actualizó con éxito.')
            ->with('status.type', 'success');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreusuariosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreusuariosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateusuariosRequest  $request
     * @param  \App\Models\Usuario  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateusuariosRequest $request, Usuario $usuarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuarios)
    {
        //
    }
}
