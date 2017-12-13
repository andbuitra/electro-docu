<?php

namespace App;

# Importing models
use App\Documento;
use App\Permiso;
use App\Empleado;
use App\Departamento;
use Illuminate\Support\Facades\DB;

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
    public function enviados(){
        return $this->hasMany('Documento');
    }

    public function permisos(){
        return $this->hasMany('Permiso');
    }

    public function empleado(){
        return $this->belongsTo('Empleado');
    }

    public function departamento(){
        return $this->belongsTo('Departamento');
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
        if(self::verifyID($credentials)){
            return false;
        }
        $usuario = self::create($credentials);       
        if(!$usuario->id){
            return false;
        }
        $employee = Empleado::where('cedula', $credentials['cedula'])->get()->first();
        $employee->usuario_id = $usuario->id;
        $employee->save();
        return true;
    }

    private static function verifyID($credentials){
        $cedula = $credentials['cedula'];
        $usuarioEmpleado = Empleado::where('cedula', $cedula)->get()->first();
        if($usuarioEmpleado === null){
            return true;
        }
        return false;
    }


    public function recibidos($usuario_id){
        return DB::table('usuarios')
        ->join('documentos', 'usuarios.id', '=', 'documentos.receptor')
        ->select('documentos.id', 'documentos.titulo', 'documentos.path', 'documentos.created_at')
        ->where('documentos.receptor', '=', $usuario_id)->get()->reverse();
    }

}
