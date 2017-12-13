<?php

namespace App;
use App\Departamento;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
  protected $fillable = [
      'id_usuario','descripcion','externo',
  ];
  
  public function departamentos(){
    $this->belongsToMany('Departamento');
  }

  # Probably won't be used
  public function usuarios(){
    $this->belongsToMany('Usuario');
  }
  
}
