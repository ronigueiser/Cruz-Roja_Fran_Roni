<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Usuario
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
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUsuarioId($value)
 * @mixin \Eloquent
 * @property int $role_id
 * @property int $curso_id
 * @property-read \App\Models\Curso|null $curso
 * @property-read \App\Models\Role|null $role
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereCursoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereRoleId($value)
 */
class Usuario extends User
{
    //use HasFactory;
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'username', 'password', 'curso_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'role_id'];


    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


    public const VALIDATE_RULES = [
        'email' => 'email:rcf,dns',
        'password' => 'required',
    ];

    public const VALIDATE_RULES_EDIT = [
        'email' => 'email:rcf,dns',
    ];

    public const VALIDATE_MESSAGES = [
        'email.email' => 'El email debe tener un formato como el siguiente: ejemplo@mail.com',
        'password.required' => 'La contraseña no puede quedar vacía.',
    ];

    public function curso()
    {
        return $this->belongsTo(
            Curso::class,
            'curso_id',
            'curso_id',
        );
    }
    public function role()
    {
        return $this->belongsTo(
            Role::class,
            'role_id',
            'role_id',
        );
    }

    public function carrito() 
    {
        return $this->belongsTo(
            Carrito::class,
            'usuario_id',
            'usuario_id',
        );
    }

    public function esAdmin()
    {
        if ($this->role->nombre == 'admin') {

            return true;
        }
        return false;
    }

}
