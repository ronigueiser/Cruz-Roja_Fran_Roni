<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    protected $table = 'novedades';
    protected $primaryKey = 'novedad_id';
    protected $fillable = ['titulo', 'curso_id', 'detalle'];

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
