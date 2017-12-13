<?php

namespace App;

use App\Usuario;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = [
        'titulo', 'notas', 'path'
    ];

    public function usuario(){
        return $this->belongsTo('App\Usuario');
    }

    public static function enviar($titulo, $notas, $receptor, $file){
        
        $documento = new Documento;
        $documento->titulo = $titulo;
        $documento->notas = $notas;
        $documento->receptor = $receptor;
        $documento->path = $file;
        $documento->usuario_id = Auth::user()->id;

        $documento->save();
        if(!$documento->id){
            return false;
        }

        return true;

    }

}
