<?php

namespace App;

use App\Usuario;
use App\Permiso;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = [
        'name'
    ];

    public function usuarios(){
        return $this->hasMany('Usuario');
    }

    public function permisos(){
        return $this->hasMany('Permiso');
    }

    # Devuelve la lista de departamentos a los cuales un usuario dado puede enviar mensajes
    public static function allowedDepartments($user_id){
        
        # Lógica por implementar. Mientras tanto devuelve todos.

        return self::all();
    }

}
