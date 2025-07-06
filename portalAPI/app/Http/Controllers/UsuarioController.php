<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Rol_Usuario;
use App\Models\Aliado;


use Illuminate\Support\Facades\Redirect;


class UsuarioController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['swValidar'] = 0;
        return view("login/login_admin",$data);
    }


    public function validar_acceso(Request $request){
        $validated = $request->validate([
            'usuario' => 'required|min:4',
            'pass' => 'required|min:8',
        ],[
            'usuario.required' => '¡El Login es obligatorio',  
            'usuario.unique' => '¡El Login ya se encuentra registrado',  
            'usuario.min' => '¡El Login esta incompleto, debe tener un mínimo de 4 Carácteres',  
            'pass.required' => '¡El password es obligatorio',  
            'pass.min' => '¡El password esta incompleto, debe tener un mínimo de 8 Carácteres',  
        ]);   

        $login = strtoupper($request->usuario);
        $pass = $request->pass;




        $consulta = Usuario::where('login',$login)
                           ->where('password',$pass)
                           ->where('id_rol',1)
                           ->first();

        if($consulta){
            if($consulta->estatus == 1){ 
                session()->put('usuario.id', $consulta->id);
                session()->put('usuario.nobUsuario', $consulta->nob_usuario);
                session()->put('usuario.apeUsuario', $consulta->ape_usuario);
                session()->put('usuario.email', $consulta->email_usuario);

                return view('home/presentacion');
            }else{
                $data['swValidar'] = 1;
                $data['mensaje'] = '!Error validación. Usuario Inhabilitado, consultar al Administrador.' ;
                return view("login/login_admin",$data);            
            }    

        }else{
            $data['swValidar'] = 1;
            $data['mensaje'] = '!Error validación. Login o Password incorrecto.';
            return view("login/login_admin",$data);            
        }


    }   



    public function olvido_clave(){
        $data['swValidarEmail'] = 0;
        return view('usuarios/olvido',$data);
    } 

    public function validar_olvido(Request $request){
        $validated = $request->validate([        
        'email' => 'required|email',
        ],[
            'email.required' => '¡El Email del Cliente es obligatorio', 
            'email.email' => '¡El Email es incorrecto',            
        ]);
    
        $email = $request->email; 
        $data = Usuario::where('email_usuario', $email)
                         ->where('id_rol',1)
                         ->where('estatus',1)
                         ->first(); 
        if($data){ 
            $codSeguridad = random_int(100000, 999999);
            $data['codigo'] = $codSeguridad;
            $data['swValidarCodigo'] =0;
            session()->put('idUsuario', $data['id']);
            session()->put('nobUsuario', $data['nob_usuario']);
            session()->put('apeUsuario', $data['ape_usuario']);
            session()->put('codSeguridad', $codSeguridad);

            //enviar correo
            return view('usuarios/ingreso_codigo',$data);
        }else{
            $data['swValidar'] = 1;
            $data['mensaje'] = '!Error validación. Usuario Inhabilitado, consultar al Administrador.' ;
            return view("login/login_admin",$data);            
        }
    }       

          
    public function validar_codigo(Request $request){
        $validated = $request->validate([        
        'codigo' => 'required|min:6',
        ],[
            'codigo.required' => '¡El codigo de seguridad es obligatorio', 
            'codigo.min' => '¡El codigo de seguridad ingresado esta incompleto', 
        ]);

        $codSeguridad = session()->get('codSeguridad');

        if($request->codigo ==  $codSeguridad){
            return view('usuarios/cambio_clave');            
        }else{
            $data['codigo'] = session()->get('codSeguridad');
            $data['swValidarCodigo'] =1;            
            return view('usuarios/ingreso_codigo',$data);            
            
        }
    }    


    public function cambiar_clave(Request $request){

        $clave = $request->clave;
        $idUsuario = session()->get('idUsuario');
        
        $usuario = Usuario::find($idUsuario);
        $usuario->password = $request->clave;

        $usuario->save();        
        if($usuario->save()){
            return Redirect::route('inicio');
            
        }else{
            dd('Error inesperado');
        }
    }   



    public function usuario_index (){
        session()->put('swIncluirUsuario', 0);  
        session()->put('swModificarUsuario', 0);  
        session()->put('swEliminarUsuario', 0);  

        $data = $this->llenarDT();
        return view('usuarios/index_usuario',$data);    


    }





    //arreglo resultante de los registro de la tabla para llenar datatable
    public function llenarDT(){
        $swRegistro = 0;
      
        $data['records'] = Usuario::select('usuarios.*', 'rol_usuarios.nob_rol', 'aliados.nob_aliado')
            ->join('rol_usuarios', 'usuarios.id_rol', '=', 'rol_usuarios.id')
            ->join('aliados', 'usuarios.id_aliado', '=', 'aliados.id')
            ->where('usuarios.id_aliado',"<>",1) 
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

        $data['aliado'] = Aliado::orderBy("nob_aliado", "asc")
               ->where("estatus",1)
               ->where("sw_aliado",1)
               ->get();
        return view('usuarios/create_usuario',$data);

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
        $usuario->id_rol = 2;
        $usuario->id_aliado = $request->idAliado;
        $usuario->password = '12345678';

        $usuario->save();
        session()->put('swIncluirUsuario', 1);    

        $data = $this->llenarDT();
        return view('usuarios/index_usuario',$data);
    }


    public function edit($id){
        session()->put('idUsuario', $id);  

        $data = Usuario::find($id);

        $data['aliado'] = Aliado::orderBy("nob_aliado", "asc")
               ->where("estatus",1)
               ->where("sw_aliado",1)
               ->get();
        return view('usuarios/update_usuario',$data);
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
        $usuario->id_aliado = $request->idAliado;
       
        $usuario->save();
        
        session()->put('swModificarUsuario', 1); 
        $data = $this->llenarDT();
        return view('usuarios/index_usuario',$data);
    }   


    public function usuario_delete($id){
        $data = Usuario::find($id);
        if($data){
           $data['nob_estatus'] = "INACTIVO"; 
           if($data['estatus'] == 0){
                $data['nob_estatus'] = "Activar";
           }else{
                $data['nob_estatus'] = "Inhabilitar"; 
           }  
           return view('usuarios/delete_usuario',$data);                     
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
      session()->put('swEliminarUsuario', 1);
      
      return Redirect::route('usuario_index');

      
    }





    


}
