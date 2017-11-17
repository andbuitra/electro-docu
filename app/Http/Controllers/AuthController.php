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
    public function showRegForm(){
        
        if(Auth::check()){
            return redirect('/');
        }

        return view('register');
        
    }  
	
    
    # Método que procesa los datos de inicio de sesión y los envía al modelo
    public function login(){

        # Stores the request helper on variable
        $request = request();
        $email = $request->input('loginEmail');
        $pwd = $request->input('loginPassword');
    
        if(!Usuario::isRegistered($email)){
            return redirect()->back()->withInput()->withErrrors([
                'exists' => 'El usuario no existe. Por favor cree una cuenta.'
            ]);
        }

        if(!Usuario::isVerified($email)){
            return redirect()->back()->withInput()->withErrors([
                'verification' => 'El usuario no ha sido verificado. Contacte al administrador del servicio.'
            ]);
        }

        $credentials = [
            'email' => $email,
            'password' => $pwd
        ];

        if(Usuario::logMe($credentials)){
            return redirect('/');
        }

        return redirect()->back()->withInput()->withErrors([
            'credentials' => 'Email o contraseña incorrectos'
        ]);


    }

    public function register(){
        $request = request();
		
        $data = [
            'nombres' => $request->input('regNombres'),
            'apellidos' => $request->input('regApellidos'),
            'cedula' => $request->input('regCedula'),
            'email' => $request->input('regCorreo'),
            'password' => bcrypt($request->input('regPassword')),
            'vercode' => str_random(12)
        ];

        $registro = Usuario::registrar($data);
		
        if($registro){
            return view('pendingApproval');
        }

        return redirect()->back()->withInput()->withErrors([
            'data' => 'Los datos ingresados no son válidos. Por favor intente nuevamente.'
        ]);

    }

    public function logout(){
        if(!Auth::check()){
            return redirect('/');
        }

        Auth::logout();
        return redirect('/');

    }

}
