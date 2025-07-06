<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Redirect;





class UsuarioAdmController extends Controller
{
    
    public function usuarioAdm_index (){
        session()->put('swIncluirUsuarioAdm', 0);  
        session()->put('swModificarUsuarioAdm', 0);  
        session()->put('swEliminarUsuarioAdm', 0);  

        $data = $this->llenarDT();
        return view('usuarioAdm/index_usuarioAdm',$data);    


    }


    //arreglo resultante de los registro de la tabla para llenar datatable
    public function llenarDT(){
        $swRegistro = 0;
      
        $data['records'] = Usuario::select('usuarios.*')
            ->where('usuarios.id_aliado',"=",1) 
            ->orderBy('ape_usuario')
            ->orderBy('nob_usuario')
            ->get();
        if($data['records']->count() > 0){
            $swRegistro = 1;
        }else{
            $swRegistro = 0;
        }
        $data['swRegistro'] = $swRegistro;
        return $data;
    }    


    public function create(){
        return view('usuarioAdm/create_usuarioAdm');
    }    

    public function save_create(Request $request){
        $validated = $request->validate([
            'nob_usuario' => 'required',
            'ape_usuario' => 'required',
            'login' => 'required|unique:usuarios,login|min:4',
            'email' => 'required|email|',
        ],[
            'nob_usuario.required' => '¡El nombre del usuario es obligatorio',  
            'ape_usuario.required' => '¡El apellido del usuario es obligatorio',  
            'login.required' => '¡El login del usuario es obligatorio',  
            'login.unique' => '¡El login del usuario ya existe',  
            'login.min' => '¡El login debe tener 4 Carácteres como nínimo',  
            'email.required' => '¡El Email del usuario es obligatorio',  
            'email.email' => '¡El email ingreado es incorrecto',  
        ]);

        $usuario = new Usuario;

        $usuario->nob_usuario = strtoupper($request->nob_usuario);
        $usuario->ape_usuario = strtoupper($request->ape_usuario);
        $usuario->email_usuario = strtoupper($request->email);
        $usuario->login = strtoupper($request->login);
        $usuario->id_rol = 1;
        $usuario->id_aliado = 1;
        $usuario->password = '12345678';

        $usuario->save();
        session()->put('swIncluirUsuarioAdm', 1);    

        $data = $this->llenarDT();
        return view('usuarioAdm/index_usuarioAdm',$data);
    }


    public function edit($id){
        session()->put('idUsuario', $id);  

        $data = Usuario::find($id);

        return view('usuarioAdm/update_usuarioAdm',$data);
    }


    public function save_update(Request $request){
        $validated = $request->validate([
            'nob_usuario' => 'required',
            'ape_usuario' => 'required',
            'email' => 'required|email|',
        ],[
            'nob_usuario.required' => '¡El nombre del usuario es obligatorio',  
            'ape_usuario.required' => '¡El apellido del usuario es obligatorio',  
            'login.required' => '¡El login del usuario es obligatorio',  
            'login.min' => '¡El login debe tener 8 Carácteres como nínimo',  
            'email.required' => '¡El Email del usuario es obligatorio',  
            'email.email' => '¡El email ingreado es incorrecto',  
        ]);

        $idUsuario = session()->get('idUsuario');
        $usuario = Usuario::find($idUsuario);

        $usuario->ape_usuario = strtoupper($request->ape_usuario);
        $usuario->nob_usuario = strtoupper($request->nob_usuario);
        $usuario->email_usuario = strtoupper($request->email);
        $usuario->login = strtoupper($request->login);
        $usuario->save();
        session()->put('swModificarUsuarioAdm', 1); 
        $data = $this->llenarDT();
        return view('usuarioAdm/index_usuarioAdm',$data);
    }   


    public function usuarioAdm_delete($id){
        $data = Usuario::find($id);
        if($data){
           $data['nob_estatus'] = "INACTIVO"; 
           if($data['estatus'] == 0){
                $data['nob_estatus'] = "Activar";
           }else{
                $data['nob_estatus'] = "Inhabilitar"; 
           }  
           return view('usuarioAdm/delete_usuarioAdm',$data);                     
        }else{
           die("Error inesperado");
        }
    }   

    public function delete(Request $request)
    {
       $id = $request->id;
       $idEstatus = $request->idEstatus;
       $usuario = Usuario::find($id);
       if($idEstatus == 0){
           $usuario->estatus = 1;
       }else{
           $usuario->estatus = 0;
       }

      $usuario->save();
      session()->put('swEliminarUsuarioAdm', 1);
      
      return Redirect::route('usuarioAdm_index');
      
      
    }





    


}
