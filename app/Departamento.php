<?php

namespace App;

use App\Usuario;
use App\Permiso;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = [
        'nombre'
    ];

    public function usuarios(){
        $this->hasMany('Usuario');
    }

    public function permisos(){
        $this->hasMany('Permiso');
    }

}
