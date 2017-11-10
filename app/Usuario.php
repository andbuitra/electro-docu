<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class Usuario extends Authenticatable
{
    protected $fillable = [
        'nombres', 'apellidos', 'cedula', 'email', 'rol', 'vercode', 'verified', 'password', 'remember_token'
    ];

    protected $hidden = [
        'password'
    ];

    public static function logMe($credentials){
        return Auth::attempt($credentials);      
    }

    public static function isVerified($email){
         
        $usuario = self::where('email', $email)->get()->first();
        
        if($usuario->verified == 1){
            return true;
        }
        

        return false;
    }

    # Returns true if user was successfully registered
    public static function registrar($credentials){
        $usuario = self::create($credentials);
        if(!$usuario->id){
            return false;
        }
        return true;
    }

}
