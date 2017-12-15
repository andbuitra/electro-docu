<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Usuario;
use App\Departamento;
use App\Permiso;
use App\Documento;
use App\Permitido;


class DashboardController extends Controller
{
    # Método que renderiza la vista principal para cualquier usuario autenticado en la aplicación
    public function index(){
		
        if(Auth::check()){
            //$usuarios = Usuario::all();
            $usuarios = Usuario::where('id', '!=', Auth::user()->id)->get();
            $departamentos = Departamento::allowedDepartments(Auth::user()->id);
            $notifications = Documento::where('receptor', Auth::user()->id)
                            ->where('revisado', '0')
                            ->take(3)
                            ->get();
            return view('dashboard')->with(compact('departamentos', 'notifications'));
        }
               
        return redirect('/login');        
        
    }

	 public function perfil(){
		
        if(Auth::check()){
            $user = Auth::user();
            $notifications = Documento::where('receptor', Auth::user()->id)
            ->where('revisado', '0')
            ->take(3)
            ->get();
            return view('perfil')->with(compact('user','notifications'));
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
        $notifications = Documento::where('receptor', Auth::user()->id)
        ->where('revisado', '0')
        ->take(3)
        ->get();

        return view('adminRegistros')->with(compact('usuarios','departamentos','notifications'));

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

        $departamentos = Departamento::all();        
        $permitidos = Permitido::all();
        $notifications = Documento::where('receptor', Auth::user()->id)
        ->where('revisado', '0')
        ->take(3)
        ->get();
        return view('adminPermiso')->with(compact('departamentos', 'permitidos', 'notifications'));
        
    }

    public function users(){
        return redirect('/admin/usuarios/control');
    }

    public function usersPerDepartment(){
        $dep_name = request()->input('departamento');        
        $departamento = Departamento::where('name', $dep_name)->get()->first();

        return Usuario::where('departamento_id', $departamento->id)->where('id', '!=', Auth::user()->id)->get()->toJson();
    }

    public function changePermission(){
        $dep_id = request()->input('d_id');
        $per_id = request()->input('p_id');

        $departamento = Departamento::find($dep_id);
        $request = request();        

        if($departamento->permitidos()->where('id', $per_id)->exists()){
            $departamento->permitidos()->detach($per_id);
            return $request->toArray();
        }

        if(!$departamento->permitidos()->where('id', $per_id)->exists()){
            $departamento->permitidos()->attach($per_id);
            return $request->toArray();
        }

        return "idk";
    }

    public function changeDep(){
        $user_id = request()->input('user_id');
        $department = request()->input('department');

        $usuario = Usuario::find($user_id);
        $departamento = Departamento::where('name', $department)->first();
        $usuario->departamento_id = $departamento->id;
        $usuario->save();

        dd($usuario);
        
        return "bien";

    }

}
