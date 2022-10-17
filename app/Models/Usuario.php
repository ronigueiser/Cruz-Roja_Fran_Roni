<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Usuario extends User
{
    //use HasFactory;
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';

    protected $fillable = ['email', 'password'];

    protected $hidden = ['password', 'remember_token'];



    public const VALIDATE_RULES = [
        'email' => 'required|min:2',
        'password' => 'required',
    ];

    public const VALIDATE_MESSAGES = [
        'email.required' => 'El email no puede quedar vacío.',
        'email.min' => 'El email debe tener al menos :min caracteres y un @.',
        'password.required' => 'La password no puede quedar vacía.',
    ];



}
