<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = "compras";
    protected $primaryKey = "compra_id";
    protected $fillable = ['mp_payment_id', 'carrito_id', 'curso_id', 'usuario_id', 'precio', 'cantidad'];

    public function curso()
    {
        return $this->belongsTo(
            Curso::class,
            'curso_id',
            'curso_id',
        );
    }

    public function usuario()
    {
        return $this->belongsTo(
            Usuario::class,
            'usuario_id',
            'usuario_id',
        );
    }
}
