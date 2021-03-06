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

        $notifications = Documento::where('receptor', Auth::user()->id)
        ->where('revisado', '0')
        ->take(3)
        ->get();

        return view('inbox')->with(compact('msgs', 'notifications'));

    }

    public function outbox(){
        if(!Auth::check()){
            return redirect('/');
        }

        $msgs = Auth::user()->enviados()->get();
        $notifications = Documento::where('receptor', Auth::user()->id)
        ->where('revisado', '0')
        ->take(3)
        ->get();        
        return view('outbox')->with(compact('msgs','notifications'));
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

        if(Auth::user()->id === $doc->receptor){
            $doc->revisado = 1;
            $doc->leido = 1;
            $doc->save();
        }
        
        $notifications = Documento::where('receptor', Auth::user()->id)
        ->where('revisado', '0')
        ->take(3)
        ->get();

        return view('detalles')->with(compact('doc', 'notifications'));

    }

    public function detallesTest(){
        return view('detalles');
    }

    public function checker(){
        $message_id = request()->input('message_id');
        $doc = Documento::find($message_id);
        if($doc->revisado === 1){
            $doc->revisado = 0;
            $doc->save();
        }else{
            $doc->revisado = 1;
            $doc->save();
        }
        return "Todo bien todo correcto equisdé";
    }

}
