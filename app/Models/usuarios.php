<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\usuarios
 *
 * @property int $usuario_id
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|usuarios newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|usuarios newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|usuarios query()
 * @method static \Illuminate\Database\Eloquent\Builder|usuarios whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|usuarios whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|usuarios wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|usuarios whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|usuarios whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|usuarios whereUsuarioId($value)
 * @mixin \Eloquent
 */
class usuarios extends User
{

    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';

    protected $fillable = ['email', 'password'];

    // Campos ignorados al serializar el modelo
    protected $hidden = ['password', 'remember_token'];
}
