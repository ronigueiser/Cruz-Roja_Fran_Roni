<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class usuarios extends User
{

    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';

    protected $fillable = ['email', 'password'];

    // Campos ignorados al serializar el modelo
    protected $hidden = ['password', 'remember_token'];
}
