<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Usuario;

class AuthController extends Controller
{

    # Método que renderiza la pantalla de inicio de sesión a usuarios que no tengan una sesión activa
    public function showLoginForm(){
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
    
    # Método que procesa los datos de inicio de sesión y los envía al modelo
    public function login(){

        # Stores the request helper on variable
        $request = request();

        $credentials = [
            'email' => $request->input('loginEmail'),
            'password' => $request->input('loginPassword')
        ];

        if(Usuario::logMe($credentials)){
            return redirect('/');
        }

        return redirect()->back()->withInput()->withErrors([
            'credentials' => 'Email o contraseña incorrectos'
        ]);


    }

}
