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
 */
class Curso extends Model
{
    // use HasFactory;

    protected $table = 'cursos';
    protected $primaryKey = 'curso_id';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'portada', 'portada_descripcion'];
}
