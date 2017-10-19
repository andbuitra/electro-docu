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
    
        return 'Formulario de inicio de sesión';

    }

    # Método que renderiza el formulario para que un usuario ingrese el código de verificación
    public function verifyReg(){
        if(Auth::check()){
            return redirect('/');
        }

        return 'Formulario para ingresar el código envíado en caso de que el usuario no haya clickeado el link';

    }

    # Método que renderiza el formulario para que un cliente finalice su proceso de registro
    public function register(){
        #$vercode = request()-
        if(Auth::check()){
            return redirect('/');
        }

        return 'Formulario para el registro de datos del nuevo usuario';
        
    }        

}
