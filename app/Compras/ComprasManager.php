<?php

namespace App\Compras;

use App\Models\Compra;
use Illuminate\Support\Collection;

class ComprasManager
{
    private array $itemsAll = [];
    private array $itemsList = [];
    private array $items = [];
    private int $totalPrice = 0;
    private array $numOperaciones = [];
    private string $fechaOperacion = '1900-01-01 00:00:00';



    public function setItems(Collection $items)
    {
        foreach ($items as $operacion => $item) {
            $this->items = [];
            $this->totalPrice = 0;
            $this->fechaOperacion = '1900-01-01 00:00:00';
            
                foreach ($item as $item1) {
                    $newItem = new Compra();
                    $newItem->mp_payment_id = $item1->mp_payment_id;
                    $newItem->created_at = $item1->created_at;
                    $newItem->nombre = $item1->curso->nombre;
                    $newItem->lugar = $item1->curso->lugar;
                    $newItem->fecha = $item1->curso->fecha;
                    $newItem->hora = $item1->curso->hora;
                    $newItem->precio = $item1->precio;
                    $newItem->cantidad = $item1->cantidad;
                    $newItems[] = $item1;
                
                $this->totalPrice += $newItem->precio * $newItem->cantidad;
                $this->fechaOperacion = $newItem->created_at;
                
                array_push($this->items, $newItem);
            }
            $this->itemsList['totalPrice'] = $this->totalPrice;
            $this->itemsList['fechaOperacion'] = $this->fechaOperacion;
            $this->itemsList['items'] = $this->items;
            $this->itemsAll[$operacion] = $this->itemsList;
            // array_push($this->itemsAll, $this->totalPrice);
            // array_push($this->itemsAll,  $this->items);
            
            
        }
    }


    public function getTotalPrice(): int
    {
        return $this->totalPrice;
    }

    public function getNumOperaciones(): array
    {
        return $this->numOperaciones;
    }
    public function getFechaOperacion(): string
    {
        return $this->fechaOperacion;
    }
    public function getItems(): array
    {
        return $this->itemsAll;
    }
    public function getItemsByNumOperacion(): int
    {
        $count = 0;
        foreach ($this->items as $item) {
            foreach ($item as $item) {
                $count += 1;
            }
        }
        return $count;
    }
}
