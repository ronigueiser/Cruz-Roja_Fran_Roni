<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Novedad
 *
 * @property int $novedad_id
 * @property string $titulo
 * @property int $curso_id
 * @property string $detalle
 * @property string|null $portada
 * @property string|null $portada_descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Curso|null $curso
 * @method static \Illuminate\Database\Eloquent\Builder|Novedad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Novedad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Novedad query()
 * @method static \Illuminate\Database\Eloquent\Builder|Novedad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Novedad whereCursoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Novedad whereDetalle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Novedad whereNovedadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Novedad wherePortada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Novedad wherePortadaDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Novedad whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Novedad whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Novedad extends Model
{
    protected $table = 'novedades';
    protected $primaryKey = 'novedad_id';
    protected $fillable = ['titulo', 'curso_id', 'detalle', 'portada', 'portada_descripcion'];

    public const VALIDATE_RULES = [
        'titulo' => 'required|min:6',
        'curso_id' => 'numeric',
        'detalle' => 'required|min:20',
    ];

    public const VALIDATE_MESSAGES = [
        'titulo.required' => 'El titulo no puede quedar vacío.',
        'titulo.min' => 'El titulo debe tener al menos :min caracteres.',
        'curso_id.numeric' => 'El curso debe ser un número.',
        'detalle.required' => 'El detalle no puede quedar vacío.',
        'detalle.min' => 'El detalle debe tener al menos :min caracteres.',
    ];

    public function curso() 
    {
        return $this->belongsTo(
            Curso::class,
            'curso_id',
            'curso_id',
        );
    }
}
