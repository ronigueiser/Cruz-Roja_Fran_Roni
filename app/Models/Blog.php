<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
