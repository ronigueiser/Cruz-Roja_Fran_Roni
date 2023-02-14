<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Carrito
 *
 * @property int $item_carrito_id
 * @property string $carrito_id
 * @property int $curso_id
 * @property int $usuario_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Curso|null $curso
 * @property-read \App\Models\Usuario|null $usuario
 * @method static \Illuminate\Database\Eloquent\Builder|Carrito newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Carrito newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Carrito query()
 * @method static \Illuminate\Database\Eloquent\Builder|Carrito whereCarritoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrito whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrito whereCursoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrito whereItemCarritoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrito whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrito whereUsuarioId($value)
 * @mixin \Eloquent
 */
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
