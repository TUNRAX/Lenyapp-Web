<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    public function Usuario()
    {
        return $this->belongsToMany(Usuario::class);
    }
}
