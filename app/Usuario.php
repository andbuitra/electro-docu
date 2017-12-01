<?php

namespace App;

# Importing models
use App\Documento;
use App\Departamento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class Usuario extends Authenticatable
{

    # Model's properties
    protected $fillable = [
        'nombres', 'apellidos', 'cedula', 'email', 'rol', 'vercode', 'verified', 'password', 'remember_token'
    ];

    protected $hidden = [
        'password'
    ];

    # Model's associations
    public function documents(){
        $this->hasMany('Documento');
    }

    public function department(){
        $this->has('Departmento');
    }



    # Model methods
    public static function logMe($credentials){
        return Auth::attempt($credentials);      
    }

    public static function isRegistered($email){
        $usuario = self::where('email', $email)->get()->first();
        if(is_null($usuario)){
            return false;
        }
        return true;
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
