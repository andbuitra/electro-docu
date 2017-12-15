<?php

namespace App;

use App\Usuario;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Collection;

class Departamento extends Model
{
    protected $fillable = [
        'name'
    ];

    public function usuarios(){
        return $this->hasMany('Usuario');
    }

    public function permitidos(){
        return $this->belongsToMany('App\Permitido');
    }

    # Devuelve la lista de departamentos a los cuales un usuario dado puede enviar mensajes
    public static function allowedDepartments(){

        $departamento_usuario = Auth::user()->departamento->id;
        $allowed = DB::table('departamento_permitido')
                ->select('permitido_id')
                ->where('departamento_id',$departamento_usuario)->get();


        $index = [];
        for($i = 0; $i < $allowed->count(); $i++){
            $index[] = $allowed[$i]->permitido_id;
        }

        $deps = self::whereIn('id',$index)->get();

        return $deps;
    }

}
