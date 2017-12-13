<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Usuario;
use App\Departamento;
use App\Permiso;
use App\Documento;


class DashboardController extends Controller
{
    # Método que renderiza la vista principal para cualquier usuario autenticado en la aplicación
    public function index(){
		
        if(Auth::check()){
            //$usuarios = Usuario::all();
            $usuarios = Usuario::where('id', '!=', Auth::user()->id)->get();
            $departamentos = Departamento::allowedDepartments(Auth::user()->id);
            return view('dashboard')->with(compact('departamentos'));
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
        $departamentos = Departamento::all();
        $permisos = Permiso::all();

        return view('adminRegistros')->with(compact('usuarios','departamentos'));

    }

    public function activate(){
        $user_id = request()->input('id');
        $verified = request()->input('verified');
        //$usuario = Usuario::where('id', $user_id)->get()->first();
        $usuario = Usuario::find($user_id);

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

    #Metodo para ver los permisos (Bae luego lo acomodara)
    # Bae ya lo acomodó ;)
    public function privileges(){

        if(!Auth::check() || Auth::user()->rol != "admin"){
            return redirect('/');
        }

        $usuarios = Usuario::all();        
        $permisos = Permiso::all();
        return view('adminPermiso')->with(compact('usuarios'));
        
    }

    public function users(){
        return redirect('/admin/usuarios/control');
    }

    public function usersPerDepartment(){
        $departamento_id = request()->input('departamento_id');        
        return Usuario::where('departamento_id', $departamento_id)->get()->toJson();
    }

}
