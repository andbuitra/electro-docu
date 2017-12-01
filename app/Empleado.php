<?php

namespace App;

use App\Usuario;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
        'cedula', 'nombre', 'apellido'
    ];

    public function usuario(){
        return $this->hasOne('Usuario');
    }

}
