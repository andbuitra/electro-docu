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
    $this->belongsToMany('Departmaneto');
  }

  public function usuarios(){
    $this->belongsToMany('Usuario');
  }
  
}
