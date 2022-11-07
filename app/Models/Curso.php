<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Curso
 *
 * @property int $curso_id
 * @property string $nombre
 * @property string $descripcion
 * @property int $precio
 * @property string|null $portada
 * @property string|null $portada_descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Curso newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Curso newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Curso query()
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereCursoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso wherePortada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso wherePortadaDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $clasificacion_id
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereClasificacionId($value)
 */
class Curso extends Model
{
    // use HasFactory;

    protected $table = 'cursos';
    protected $primaryKey = 'curso_id';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'portada', 'portada_descripcion'];

    public const VALIDATE_RULES = [
        'nombre' => 'required|min:2',
        'descripcion' => 'required|min:10',
        'precio' => 'required|numeric|min:0',
    ];

    public const VALIDATE_MESSAGES = [
        'nombre.required' => 'El nombre no puede quedar vacío.',
        'nombre.min' => 'El nombre debe tener al menos :min caracteres.',
        'descripcion.required' => 'La descripcion no puede quedar vacía.',
        'descripcion.min' => 'La descripcion debe tener al menos :min caracteres.',
        'precio.required' => 'El precio no puede quedar vacío.',
        'precio.numeric' => 'El precio debe ser un número.',
        'precio.min' => 'El precio no puede ser negativo.',
    ];

    public function clasificacion() 
    {
        return $this->belongsTo(
            Clasificacion::class,
            'clasificacion_id',
            'clasificacion_id',
        );
    }
}
