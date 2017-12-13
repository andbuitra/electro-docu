<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Usuario;
use App\Departamento;
use App\Permiso;
use App\Documento;
use URL;

class MessagesController extends Controller
{
    public function enviar(){
        
        $titulo = request()->input('titulo');
        $notas = request()->input('notas');
        $receptor = request()->input('receptor');
        $file = request()->file('documento')->store('documentos', 'public');
        
        if(Documento::enviar($titulo, $notas, $receptor, $file)){
            return redirect('/outbox');
        }

        return Error;


    }

    public function inbox(){
        
        if(!Auth::check()){
            return redirect('/');
        }

        $msgs = Auth::user()->recibidos(Auth::user()->id);

        if(!$msgs){
            return 'There are no messages';
        }

        return view('inbox')->with(compact('msgs'));

    }

    public function outbox(){
        if(!Auth::check()){
            redirect('/');
        }

        $msgs = Auth::user()->enviados()->get();
        return view('outbox')->with(compact('msgs'));
    }

    public function detalles($id){
        if(!Auth::check()){
            redirect('/');
        }

        if($id === null){
            return redirect('/inbox');
        }

        $msgid = request()->segment(2);
        // $doc = Documento::where('id', $msgid)->get()->first();
        $doc = Documento::find($msgid);

        if($doc->usuario->id != Auth::user()->id && $doc->receptor != Auth::user()->id){
            return redirect('/inbox');
        }

        if(!$doc){
            return redirect('/inbox');
        }

        return view('detalles')->with(compact('doc'));

    }

    public function detallesTest(){
        return view('detalles');
    }
}
