<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class Usuario extends Authenticatable
{
    protected $fillable = [
        'nombres', 'apellidos', 'cedula', 'correo', 'rol', 'vercode', 'verified'
    ];

    protected $hidden = [
        'password'
    ];

    public static function logMe($credentials){
        return Auth::attempt($credentials);      
    }

    public static function isVerified($email){
         
        $usuario = self::where('email', $email)->get();

        if($usuario->verified == 1){
            return true;
        }
        

        return false;
    }

}
