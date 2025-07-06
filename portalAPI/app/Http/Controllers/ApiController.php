<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Api;
use App\models\Tipo_Api;
use Illuminate\Support\Facades\Redirect;


class ApiController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */

    public function index(){

        session()->put('swIncluirApi', 0);  
        session()->put('swModificarApi', 0);  
        session()->put('swEliminarApi', 0);  

        $data = $this->llenarDT();
        return view('apis/index_api',$data);    
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['tipo'] = Tipo_Api::where('estatus',1)
                      ->orderBy('nob_tipo_api')
                      ->get();
        return view('apis/create_api',$data);
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
       $data = Api::find($id);
       $data['tipo'] = Tipo_Api::where('estatus',1)
                      ->orderBy('nob_tipo_api')
                      ->get();       

       session()->put('nobApi', $data['nob_api']);
       session()->put('idApi', $data['id']);

       if($data){
         $data['swModificar'] = 0;
         return view('apis/update_Api',$data);                     
       }else{
           die("Error inesperado");
       }
    }

    /**
     * Update the specified resource in storage.
     */

    public function save_update(Request $request){
        $validated = $request->validate([
            'nob_api' => ['required'],
            'des_api' => ['required']
        ],[
            'nob_api.required' => '¡El nombre es obligatorio',  
            'des_api.required' =>'¡La descripción es obligatoria',
        ]);

        $nobApi = session()->get('nobApi');
        $idApi = session()->get('idApi');

        if($nobApi != $request->nob_api){
            $consulta = Api::where('nob_api',$request['nob_api'])->count();
            if($consulta > 0){ 
                $data = Api::find($idApi);
                $data['swModificar'] = 1;
                return view('apis/update_Api',$data);     
            }
        }    
        

        $id = session()->get('idApi');
        $api = Api::find($idApi);
        $api->nob_api = $request->nob_api;
        $api->desc_api = $request->des_api;
        $api->id_tipo_api = $request->idTipo;

        $api->save();
        session()->put('swModificarApi', 1); 
        $data = $this->llenarDT();
        return view('apis/index_api',$data);
    }   


    public function save_create(Request $request){
        $validated = $request->validate([
            'nob_api' => 'required|unique:apis,nob_api',
            'des_api' => 'required',
        ],[
            'nob_api.required' => '¡El nombre es obligatorio',  
            'nob_api.unique' => 'El registro ingresado ya existe',
            'des_api.required' =>'¡La descripción es obligatoria',
        ]);
        $api = new Api;
        $api->estatus = 1;      

        $api->nob_api = $request->nob_api;
        $api->desc_api = $request->des_api;
        $api->id_tipo_api = $request->idTipo;
        $api->save();
        session()->put('swIncluirApi', 1);    
        $data = $this->llenarDT();
        return view('apis/index_api',$data);
    }

    public function api_delete(Request $request, string $id)
    {
        $data = Api::find($id);
        if($data){
            $data['nob_estatus'] = "INACTIVO"; 
           if($data['estatus'] == 0){
                $data['nob_estatus'] = "Activar";
           }else{
                $data['nob_estatus'] = "Inhabilitar"; 
           }  
           return view('apis/delete_api',$data);                     
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

       $idEstatus = $request->idEstatus;
       $api = Api::find($id);
       if($idEstatus == 0){
           $api->estatus = 1;
       }else{
           $api->estatus = 0;
       }

      $api->save();
      session()->put('swEliminarApi', 1);
      
      return Redirect::route('index_api');

        
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
        $data['records'] = Api::select('apis.*', 'tipo_apis.nob_tipo_api')
                ->join('tipo_apis', 'apis.id_tipo_api', '=', 'tipo_apis.id')
                ->orderBy('nob_api')
                ->get();

        if($data['records']->count() > 0){
            $swRegistro = 1;
        }else{
            $swRegistro = 0;
        }
        $data['swRegistro'] = $swRegistro;
        return $data;
    }     


}
