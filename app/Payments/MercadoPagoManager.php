<?php

namespace App\Payments;

use Illuminate\Support\Collection;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

class MercadoPagoManager
{
    private Preference $preference;
    private array $items;
    private int $totalPrice = 0;

    public function __construct()
    {
        SDK::setAccessToken(config('mercadopago.access_token'));
        $this->preference = new Preference();
    }

    public function setItems(Collection $items)
    {
        foreach ($items as $item) {
            $newItem = new Item();
            $newItem->title = $item->curso->nombre;
            $newItem->unit_price = $item->curso->precio;
            $newItem->quantity = 1;
            $newItems[] = $item;

            $this->totalPrice += $newItem->unit_price * $newItem->quantity;

            $this->items[] = $newItem;
        }
    }

    public function setReturnURls(?string $success = null, ?string $pending = null, ?string $failure = null)
    {
        $this->preference->back_urls = [
            'success' => $success,
            'pending' => $pending,
            'failure' => $failure,
        ];
    }

    public function prepare()
    {
        $this->preference->items = $this->items;
        $this->preference->save();
    }

    public function getTotalPrice(): int
    {
        return $this->totalPrice;
    }

    public function getItems(): array
    {
        return $this->items;
    }
    public function getPaymentId(): string
    {
        return $this->preference->id;;
    }
    public function getPublicKey(): string
    {
        return config('mercadopago.public_key');
    }
}
