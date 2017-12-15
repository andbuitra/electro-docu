<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Departamento;

class Permitido extends Model
{
    
    public function departamentos(){
        return $this->belongsToMany('Departamento');
    }
}
