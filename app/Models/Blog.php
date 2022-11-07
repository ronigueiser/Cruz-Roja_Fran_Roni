<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blog
 *
 * @property int $comentario_id
 * @property string $usuario
 * @property string $curso
 * @property string $comentario
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereComentario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereComentarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCurso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUsuario($value)
 * @mixin \Eloquent
 */
class Blog extends Model
{
    protected $table = 'comentarios';
    protected $primaryKey = 'comentario_id';
    protected $fillable = ['usuario', 'curso', 'comentario'];

    public const VALIDATE_RULES = [
        'usuario' => 'required|min:2',
        'curso' => 'required|min:2',
        'comentario' => 'required|min:0',
    ];

    public const VALIDATE_MESSAGES = [
        'usuario.required' => 'El usuario no puede quedar vacío.',
        'usuario.min' => 'El usuario debe tener al menos :min caracteres.',
        'curso.required' => 'El curso no puede quedar vacío.',
        'curso.min' => 'El curso debe tener al menos :min caracteres.',
        'comentario.required' => 'El comentario no puede quedar vacío.',
        'comentario.min' => 'El comentario debe tener al menos :min caracteres.',
    ];
}
