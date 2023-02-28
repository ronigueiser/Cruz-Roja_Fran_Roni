<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Carrito;
use App\Models\Compra;
use App\Payments\MercadoPagoManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

class MercadoPagoController extends Controller
{
    // public function confirmarCompraForm()
    // {
        

    //     $preference = new Preference();

    //     $cursos = Curso::findMany([1, 2, 3]);
    //     $items = [];

    //     foreach ($cursos as $curso) {
    //         $item = new Item();

    //         $item->title = $curso->nombre;
    //         $item->unit_price = $curso->precio;
    //         $item->quantity = 1;
    //         $items[] = $item;
    //     }

    //     $preference->items = $items;

    //     /* CONFIGURACION DE URLs DE RETORNO*/

    //     $preference->back_urls = [
    //         'success' => route('mp.success'),
    //         'pending' => route('mp.pending'),
    //         'failure' => route('mp.failure'),
    //     ];

    //     $preference->save();

    //     return view('mercadopago.confirmar-compra', [
    //         'preference' => $preference,
    //         'publicKey' => config('mercadopago.public_key'),
    //     ]);
    // }
    public function confirmarCompraForm()
    {
        $builder = Carrito::with(['curso']);
        $usuarios_carritos = $builder->get()->where('usuario_id', Auth::id());

        $manager = new MercadoPagoManager();
        $manager->setItems($usuarios_carritos);
        $manager->setReturnURLs(
            success: route('mp.success'),
            pending: route('mp.pending'),
            failure: route('mp.failure'),
        );
        $manager->prepare();

        return view('mercadopago.confirmar-compra', [
            'manager' => $manager,
        ]);
    }

    public function successEjecutar(Request $request)
    {   
        $usuarios_carrito = Carrito::with(['curso'])->get()->where('usuario_id', Auth::id());
        $id = Auth::id();
        $data = [];

        foreach ($usuarios_carrito as $item) {
            $data = [
                'mp_payment_id' => $request->payment_id,
                'carrito_id' => $item->carrito_id,
                'curso_id' => $item->curso_id,
                'usuario_id' => Auth::id(),
                'precio' => $item->curso->precio,
                'cantidad' => 1,
            ];
            $compra = Compra::create($data);
            $carrito = Carrito::destroy($item->item_carrito_id);
        }
        return redirect()->route('carrito')
            ->with('status.message', 'Tu compra se realizó con éxito. Podés ver tu historial de compras en tu perfil.')
            ->with('status.type', 'success');
        
    }
}
