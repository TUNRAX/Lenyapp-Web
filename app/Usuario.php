<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario';

    protected $fillable = [
        'correo', 'contrasenya',
    ];

    protected $hidden = [
        'contrasenya',
    ];

    public function getAuthPassword()
    {
        return $this->contrasenya;
    }

    public $timestamps = false;

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function hasRol(array $roles)
    {
        foreach ($roles as $rol) {
            if ($this->id_rol === $rol) {
                return true;
            }
        }
        return false;
    }
}
