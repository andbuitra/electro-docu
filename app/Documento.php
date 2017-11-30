<?php

namespace App;

use App\Usuario;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = [
        'titulo', 'notas', 'path'
    ];

    public function users(){
        $this->belongsToMany('Usuario');
    }
}
