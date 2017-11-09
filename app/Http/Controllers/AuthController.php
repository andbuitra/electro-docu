<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{

    # Método que renderiza la pantalla de inicio de sesión a usuarios que no tengan una sesión activa
    public function login(){
        if(Auth::check()){
            return redirect('/');
        }
    
        return view('login');

    }

    # Método que renderiza el formulario para que un usuario ingrese el código de verificación
    public function verifyReg($vercode){
        if(Auth::check()){
            return redirect('/');
        }

        # Verifica en la DB
        # Placeholder
        return redirect('/');

    }

    # Método que renderiza el formulario para que un cliente finalice su proceso de registro
    public function register(){
        
        if(Auth::check()){
            return redirect('/');
        }

        return view('register');
        
    }        

}
