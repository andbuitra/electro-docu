<?php

namespace App;
use App\Departamento;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
  protected $fillable = [
      'id_usuario','descripcion','externo',
  ];
  
  /* 
  public function users(){
    $this->ManytoMany('Departamento');
  }
  
  public function user(){
    $this->ManytoMany('Usuario');
  }
  */
  public function departamentos(){
    $this->belongsToMany('Departmaneto');
  }
  
}
