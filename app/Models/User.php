<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Define el nombre de la tabla en la base de datos.
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * Sobrescribe el método que le dice a Laravel qué columna es
     * el identificador único para la autenticación.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'correo';
    }

    /**
     * Sobrescribe el método que le dice a Laravel qué columna es
     * la contraseña para la autenticación.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->contraseña;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'contraseña',
        'rol_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'contraseña',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];
}
