<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    # Método que renderiza la vista principal para cualquier usuario autenticado en la aplicación
    public function index(){
        if(Auth::check()){
            return 'Esta es la vista principal del Dashboard';
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

    # Método que renderiza la pantalla de inicio de sesión a usuarios que no tengan una sesión activa
    public function login(){
        
        if(Auth::check()){
            return redirect('/');
        }

        return 'Formulario de inicio de sesión';
    }

    # Método que renderiza el formulario para que un administrador habilite el correo de un usuario para su registro
    public function add(){
        if(Auth::check()){
            if(Auth::user()->user()->rol == 'admin'){
                return 'Formulario para que el administrador envíe el código de registro a un nuevo usuario';
            }
        }
    }

    public function verifyReg(){
        if(Auth::check()){
            return redirect('/');
        }

        return 'Formulario para ingresar el código envíado en caso de que el usuario no haya clickeado el link';

    }

    public function register(){

        #$vercode = request()-
        if(Auth::check()){
            return redirect('/');
        }

        return 'Formulario para el registro de datos del nuevo usuario';
        
    }
    
}
