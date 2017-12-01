<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
  protected $fillable = [
      'id_usuario','descripcion','externo',
  ];
  public function users(){
    $this->ManytoMany('Departamento');
  }
  public function user(){
    $this->ManytoMany('Usuario');
  }
}
