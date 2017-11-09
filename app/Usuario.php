<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class Usuario extends Authenticatable
{
    protected $fillable = [
        'nombres', 'apellidos', 'cedula', 'correo', 'rol', 'vercode'
    ];

    protected $hidden = [
        'password'
    ];

    public static function logMe($credentials){
        return Auth::attempt($credentials);        
    }

}
