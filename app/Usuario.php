<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Autenticable
{
    protected $fillable = [
        'nombre', 'clave'
    ];

    protected $hidden = [
        'password'
    ];
}
