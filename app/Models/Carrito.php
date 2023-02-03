<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = "carrito";
    protected $primaryKey = "item_carrito_id";
    protected $fillable = ['carrito_id', 'curso_id', 'usuario_id'];

    /*
    |---------------------------------------------------------
    |   Relaciones
    |---------------------------------------------------------
    */

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
