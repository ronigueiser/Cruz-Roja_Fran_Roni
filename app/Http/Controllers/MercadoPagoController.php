<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

class MercadoPagoController extends Controller
{
    public function confirmarCompraForm()
    {
        SDK::setAccessToken(config('mercadopago.access_token'));

        $preference = new Preference();

        $cursos = Curso::findMany([1, 2, 3]);
        $items = [];

        foreach($cursos as $curso) {
            $item = new Item();

            $item->title = $curso->nombre;
            $item->unit_price = $curso->precio;
            $item->quantity = 1;
            $items[] = $item;
        }

        $preference->items = $items;

        /* CONFIGURACION DE URLs DE RETORNO*/

        $preference->back_urls = [
            'success'=> route('mp.success'),
            'pending'=> route('mp.pending'),
            'failure'=> route('mp.failure'),
        ];

        $preference->save();

        return view('mercadopago.confirmar-compra', [
            'preference'=>$preference,
            'publicKey'=>config('mercadopago.public_key'),
        ]);
    }
}
