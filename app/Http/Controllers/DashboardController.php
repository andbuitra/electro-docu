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
            $usuarios = Usuario::all();
            return view('dashboard')->with(compact('usuarios'));
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

    public function inbox(){
        if(!Auth::check()){
            redirect('/');
        }

        $msgs = Auth::user()->recibidos(Auth::user()->id);

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
            return redirec('/inbox');
        }

        $msgid = request()->segment(2);
        $doc = Documento::where('id', $msgid)->get()->first();

        return view('detalles')->with(compact('doc'));

    }

    public function enviar(){
        
        $titulo = request()->input('titulo');
        $notas = request()->input('notas');
        $receptor = request()->input('receptor');
        $file = request()->file('documento')->store('documentos');
        
        if(Documento::enviar($titulo, $notas, $receptor, $file)){
            return redirect('/outbox');
        }

        return Error;


    }

    public function detallesTest(){
        return view('detalles');
    }

}
