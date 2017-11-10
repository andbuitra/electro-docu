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
        $request = request();

        $usuario = Usuario::find($request->input('id'))->get();

        $usuario->verified = $request->input('verified');
        $usuario->save();

        return 'ok';

    }

}
