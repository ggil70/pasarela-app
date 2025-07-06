<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\Rol_Usuario;

//use Session;



class RolUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(){

        session()->put('swIncluirRol', 0);  
        session()->put('swModificarRol', 0);  
        session()->put('swEliminarRol', 0);  

        $data = $this->llenarDT();
        return view('rols/index_rol',$data);    
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rols/create_rol');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $data = Rol_Usuario::find($id);

       session()->put('nobRol', $data['nob_rol']);
       session()->put('idRol', $data['id']);

       if($data){
         $data['swModificar'] = 0;
         return view('rols/update_Rol',$data);                     
       }else{
           die("Error inesperado");
       }
    }

    /**
     * Update the specified resource in storage.
     */

    public function save_update(Request $request){

        $validated = $request->validate([
            'nob_rol' => ['required']
        ]);

        $nobRol = session()->get('nobRol');
        $idRol = session()->get('idRol');

        if($nobRol != $request->nob_rol){
            $consulta = Rol::where('nob_rol',$request['nob_rol'])->count();
            if($consulta > 0){ 
                $data = Rol_Usuario::find($idRol);
                $data['swModificar'] = 1;
                return view('rols/update_Rol',$data);     
            }
        }    
        

        $id = session()->get('idRol');
        $rol = Rol_Usuario::find($idRol);
        $rol->nob_rol = strtoupper($request->nob_rol);

        if($request->estatus==true){
           $rol->estatus = 1;      
        }else{
            $rol->estatus = 0;
        }
        

        $rol->save();
        session()->put('swModificarRol', 1); 

        $data = $this->llenarDT();
        return view('rols/index_rol',$data);
    }   


    public function save_create(Request $request){
        $validated = $request->validate([
            'nob_rol' => 'required|unique:rol_usuarios,nob_rol',
        ],[
            'nob_rol.required' => '¡El nombre es obligatorio',  
            'nob_rol.unique' => 'Ya existe',
        ]);
        $rol = new Rol_Usuario;
        if($request->estatus==true){
           $rol->estatus = 1;      
        }else{
            $rol->estatus = 0;
        }

        $rol->nob_rol = strtoupper($request->nob_rol);
        $rol->save();
        session()->put('swIncluirRol', 1);    

        $data = $this->llenarDT();
        return view('rols/index_rol',$data);
    }




    public function rol_delete(Request $request, string $id)
    {
        $data = Rol_Usuario::find($id);
        if($data){
           return view('rols/delete_rol',$data);                     
        }else{
           die("Error inesperado");
        }
    }


/**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
      $id = $request->id;
      $rol = Rol_Usuario::find($id);
      $rol->estatus = 0;
      $rol->save();
      session()->put('swEliminarRol', 1);
      $data = $this->llenarDT();
      return view('rols/index_rol',$data);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    
    //arreglo resultante de los registro de la tabla para llenar datatable
    public function llenarDT(){
        $swRegistro = 0;
        $data['records'] = Rol_Usuario::orderBy('nob_rol','asc')->get();

        if($data['records']->count() > 0){
            $swRegistro = 1;
        }else{
            $swRegistro = 0;
        }
        $data['swRegistro'] = $swRegistro;
        return $data;
    }     



}
