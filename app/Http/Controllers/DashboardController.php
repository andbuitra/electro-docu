<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Usuario;

class DashboardController extends Controller
{
    # Método que renderiza la vista principal para cualquier usuario autenticado en la aplicación
    public function index(){
		
        if(Auth::check()){
            return view('dashboard');
        }
        
        return redirect('/login');
        
    }	
	 public function perfil(){
		
        if(Auth::check()){
            $user = Auth::user();
            return view('perfil')->with(compact('user'));
        }
        
        return redirect('/');
        
    }

    # Método que renderiza el panel de administración
    public function admin(){

        if(Auth::check()){
            if(Auth::user()->user()->rol == 'admin'){
                return 'Vista de panel de administración';
            }
            return 'No tiene privilegios para ver esta página';
        }
        
        return redirect('/');
    }

    # Método que renderiza el formulario para que un administrador habilite el correo de un usuario para su registro
    public function add(){
        if(Auth::check()){
            if(Auth::user()->user()->rol == 'admin'){
                return 'Formulario para que el administrador envíe el código de registro a un nuevo usuario';
            }
        }
    }


    public function manageUsers(){
        if(!Auth::check() || Auth::user()->rol != "admin"){
            return redirect('/');
        }

        $usuarios = Usuario::all(); 

        return view('adminRegistros')->with(compact('usuarios'));

    }

    public function activate(){
        $user_id = request()->input('id');
        $verified = request()->input('verified');
        $usuario = Usuario::where('id', $user_id)->get()->first();

        $usuario->verified = $verified;
        if($usuario->save()){
            return "true";
        }
        
        return "false";

    }

    public function adminRoot(){
        # Lol you shouldn't be here ecks dee
        return redirect('/');
    }

}
