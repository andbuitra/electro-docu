<?php

namespace App;

use App\Usuario;
use App\Permitido;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = [
        'name'
    ];

    public function usuarios(){
        return $this->hasMany('Usuario');
    }

    public function permitidos(){
        return $this->belongsToMany('Permitido');
    }

    # Devuelve la lista de departamentos a los cuales un usuario dado puede enviar mensajes
    public static function allowedDepartments($user_id){
        
        # Lógica por implementar. Mientras tanto devuelve todos.

        return self::all();
    }

}
