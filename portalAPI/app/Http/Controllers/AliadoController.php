<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Aliado;
use App\models\Rol;
use App\models\Api;
use App\models\Api_Aliado;
use App\models\Codigo_Telefono;
use App\models\Log_Activar;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\MiCorreo;


class AliadoController extends Controller
{
        public function index(){

        session()->put('swIncluirAliado', 0);  
        session()->put('swModificarAliado', 0);  
        session()->put('swEliminarAliado', 0);  

        $data = $this->llenarDT();
        return view('aliados/index_aliado',$data);    
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $aliado = new Aliado();
        $data['tipoDocumento'] = $aliado->listaTipoDocumento();
        $data['codigoTelefono'] = Codigo_Telefono::orderBy("cod_telefono", "asc")->where("estatus",1)->get();


        return view('aliados/create_aliado',$data);
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
       $data = Aliado::find($id);

       $aliado = new Aliado();
       $data['tipoDocumento'] = $aliado->listaTipoDocumento();
       $data['codigoTelefono'] = Codigo_Telefono::orderBy("cod_telefono", "asc")->where("estatus",1)->get();       

       session()->put('emailAliadoAliado', $data['email']);
       session()->put('idAliado', $data['id']);
       session()->put('nobAliado', $data['nob_aliado']);


       if($data){
           $data['swModificar'] = 0;
           return view('aliados/update_aliado',$data);                     
       }else{
           die("Error inesperado");
       }
    }

    /**
     * Update the specified resource in storage.
     */

    public function save_update(Request $request){
        $validated = $request->validate([
            'nob_aliado' => 'required',
            'doc_aliado' => 'required',
            'email_aliado' => 'required|email',
            'cta_asoc' => 'required|min:16',
            'nro_cel' => 'required|min:7',
            'logo' => 'max:2048|mimes:jpeg,png,jpg,gif'
        ],[
            'nob_aliado.required' => '¡El nombre es obligatorio',  
            'doc_aliado.required' =>'¡La Cédula / RIF del Aliado es obligatorio',
            'email_aliado.required' => '¡El Email del Cliente es obligatorio', 
            'email_aliado.email' => '¡El Email es incorrecto',            
            'cta_asoc.min' => '¡La cuenta esta incompleta, debe tener 20 dígitos',            
            'cta_asoc.required' => '¡El Número de cuenta es obligatorio',  
            'nro_cel.min' => '¡El Número de Celular, debe tener 7 dígitos',            
            'nro_cel.required' => '¡El Número de celular es obligatorio',    
            'logo.max' => '¡El archivo excede del tamaño permitido(2048 Mbtes)',  
            'logo.mimes' => '¡La extensión del archivo no es compatible con los formatos jpeg,png,jpg,gif',  
        ]);

        $nobAliado = session()->get('nobAliado');
        $idAliado = session()->get('idAliado');
        $aliado = Aliado::find($idAliado);

        if($nobAliado != $request->nob_aliado){
            $consulta = Aliado::where('nob_aliado',$request['nob_aliado'])->count();

            //$data = Aliado::find($idAliado); 
            if($consulta > 0){ 
                $data = Aliado::find($idAliado);

                $data['tipoDocumento'] = $aliado->listaTipoDocumento();
                $data['codigoTelefono'] = Codigo_Telefono::orderBy("cod_telefono", "asc")->where("estatus",1)->get();                
                $data['swModificar'] = 1;
                return view('aliados/update_aliado',$data);     
            }
        }  

        $aliado = Aliado::find($idAliado);
        $aliado->nob_aliado = strtoupper($request->nob_aliado);  
        $aliado->cta_aliado = "0171". $request->cta_asoc;
        $aliado->email = $request->email_aliado;
        $aliado->tipo_documento = $request->tipo_doc;
        $aliado->nro_documento = $request->doc_aliado;
        $aliado->id_cod_telefono = $request->cod_cel;
        $aliado->nro_celular = $request->nro_cel;
        $aliado->save();

        //copiar y guardar la ruta del archivo logo
        if($request->valFile){
            $logo = $request->file('logo');
            $extension = $logo->getClientOriginalExtension();
            $nobArchivo = "logo_" . trim($idAliado) . "_" . date('Ymd') . "." . $extension;
            $ruta = $logo->storeAs('logo', $nobArchivo, 'public');
            //$aliadoId = $aliado->id;
            $aliado = Aliado::find($idAliado);
            $rutaLogo = 'logo/' . $nobArchivo;
            $aliado->logo = $rutaLogo;
            $aliado->save();
        }  


        //Enviar Correo


        session()->put('swModificarAliado', 1); 
        return Redirect::route('index_aliado');
    }   

    public function save_create(Request $request){
        $validated = $request->validate([
            'nob_aliado' => 'required|unique:aliados,nob_aliado',
            'doc_aliado' => 'required',
            'email_aliado' => 'required|email',
            'cta_asoc' => 'required|min:16',
            'nro_cel' => 'required|min:7',
            'logo' => 'max:2048|mimes:jpeg,png,jpg,gif',
            'mto_vuelto' => 'required'

        ],[
            'nob_aliado.required' => '¡El nombre es obligatorio',
            'nob_aliado.unique' => 'El nombre ingresado ya existe',
            'doc_aliado.required' =>'¡La Cédula / RIF del Aliado es obligatorio',
            'email_aliado.required' => '¡El Email del aliado es obligatorio', 
            'email_aliado.email' => '¡El Email es incorrecto',            
            'cta_asoc.min' => '¡La cuenta esta incompleta, debe tener 20 dígitos',            
            'cta_asoc.required' => '¡El Número de cuenta es obligatorio',  
            'nro_cel.min' => '¡El Número de Celular, debe tener 7 dígitos',            
            'nro_cel.required' => '¡El Número de celular es obligatorio',  
            'mto_vuelto.required' => '¡El monto maximo del vuelto es obligatorio',  
            'logo.max' => '¡El archivo excede del tamaño permitido(2048 Mbtes)',  
            'logo.mimes' => '¡La extensión del archivo no es compatible con los formatos jpeg,png,jpg,gif',  
        ]);

        //validar un campo file   
        //'file' => 'required|file|max:2048|mimes:jpeg,png,jpg,gif',
        /////////////////////////////////////////////////////////////

        $apiKey = Str::random(40);
        $monto = str_replace(",", ".", $request->mto_vuelto);   

        $aliado = new Aliado;
        $aliado->nob_aliado = strtoupper($request->nob_aliado);
        $aliado->cta_aliado = "0171" . $request->cta_asoc;

        $aliado->tipo_documento = $request->tipo_doc;
        $aliado->nro_documento = $request->doc_aliado;

        $aliado->max_vuelto = $monto;  
        $aliado->apikey = $apiKey;
        
        $aliado->id_cod_telefono = $request->cod_cel;
        $aliado->nro_celular = $request->nro_cel;
        $aliado->email = $request->email_aliado;
        $aliado->fec_activacion = date("Y-m-d H:m:s");
        $aliado->save();

        //copiar y guardar la ruta del archivo logo
        $aliadoId = $aliado->id;        
        $logo = $request->file('logo');
        if(empty($logo)){
            //Si no ingreso un logo se coloca por defecto
            $nobArchivo = "sinLogo.png";
        }else{
            $extension = $logo->getClientOriginalExtension();
            $nobArchivo = "logo_" . trim($aliadoId) . "_" . date('Ymd') . "." . $extension;
            $ruta = $logo->storeAs('logo', $nobArchivo, 'public');
        }

        $aliado = Aliado::find($aliadoId);
        $rutaLogo = 'logo/' . $nobArchivo;
        $aliado->logo = $rutaLogo;
        $aliado->save();


        //ASIGNAR APIS al aliado
        $apis = Api::where('estatus',1)
              ->orderBy('nob_api','asc')->get();
        if($apis->count() > 0){
            
            foreach ($apis as $record){
                $apiAliado = new Api_Aliado;
                $apiAliado->id_aliado = $aliadoId;
                $apiAliado->id_api = $record['id'];
                $apiAliado->estatus = 1;
                $apiAliado->fec_afiliacion = date("Y-m-d h:i:s");
                $apiAliado->save();                
            }    
        }        

        session()->put('swIncluirAliado', 1);
        return Redirect::route('index_aliado');
    }




    public function aliado_delete(Request $request, string $id)
    {
        $data = Aliado::find($id);
        if($data){
           return view('aliados/delete_aliado',$data);                     
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

      $aliado = Aliado::find($id);

      //$aliado->delete();


      session()->put('swEliminarAliado', 1);


      //Enviar correo
      $data['name'] ='Ejemplo'; 
      
      Mail::to('ggil@ebancoactivo.com')->send(new MiCorreo($data));




        


      return Redirect::route('asignar_api');
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
        $data['records'] = Aliado::select('aliados.*')->orderBy('nob_aliado','asc')->get();

        if($data['records']->count() > 0){
            $swRegistro = 1;
        }else{
            $swRegistro = 0;
        }
        $data['swRegistro'] = $swRegistro;
        return $data;
    }    


    public function aliado_apis($id){
        $aliadoId = $id;
        $data = Aliado::find($aliadoId);
        $data['nob_aliado'] = $data->nob_aliado;  

        $data['records'] = Aliado::leftJoin('api_aliados', 'aliados.id', '=', 'api_aliados.id_aliado')
                ->where('aliados.id', $id)
                ->select('aliados.id','aliados.nob_aliado', DB::raw('count(api_aliados.id) as nro_apis'))
                ->groupBy('aliados.nob_aliado','aliados.id')
                ->first();        

        $data['nro_registro'] = $data['records']->nro_apis;    

        $data['apis'] = $apis = Api::leftJoin('api_aliados', function ($join) use ($aliadoId) {
                $join->on('apis.id', '=', 'api_aliadoa.id_api')
                ->where('api_aliados.id_aliado', '=', $aliadoId);
                })
                ->select('apis.id','apis.nob_api', 'api_aliados.id_aliado','api_aliados.id_api', 'api_aliados.id as id_api_aliado')
                ->orderBy('apis.nob_api')
                ->get();
        session()->put('idAliado', $id);
        return view('aliados/asignar_api_aliado',$data);
    }




    public function aliado_detalle($id){
        $data = Aliado::select('aliados.*', 'codigo_telefonos.cod_telefono')
                ->join('codigo_telefonos', 'aliados.id_cod_telefono', '=', 'codigo_telefonos.id')
                ->where("aliados.id", "=", $id)
                ->first();
        return view('aliados/aliado_detalle',$data);         
    }





    public function afiliar_apis(){
        $swRegistro = 0;

        $data['records'] = Aliado::leftJoin('api_aliados', 'aliados.id', '=', 'api_aliados.id_aliado')
                ->where('aliados.estatus', 1)
                ->select('aliados.id','aliados.nob_aliado', DB::raw('count(api_aliados.id) as nro_apis'))
                ->groupBy('aliados.nob_aliado','aliados.id')
                ->get();


        if($data['records']->count() > 0){
            $swRegistro = 1;
        }else{
            $swRegistro = 0;
        }
        $data['swRegistro'] = $swRegistro;
        return view('aliados/afiliar_apis',$data);      
    }


    public function apis_detalle($id){
        $aliadoId = $id;
        $data = Aliado::find($aliadoId);
        $data['nob_aliado'] = $data->nob_aliado;

        $data['apis'] = $apis = Api::Join('api_aliados', function ($join) use ($aliadoId) {
                $join->on('apis.id', '=', 'api_aliados.id_api')
                ->where('api_aliados.id_aliado', '=', $aliadoId);
                })
                ->select('apis.id','apis.nob_api', 'api_aliados.id_cliente','api_aliados.id_api', 'api_aliados.id as id_api_aliado')
                ->orderBy('apis.nob_api')
                ->get();
        session()->put('idAliado', $id);
        return view('aliados/apis_detalle',$data);
    }


    public function act_aliado(){
        $swRegistro = 0;

        $data['records'] = Aliado::orderBy('nob_aliado','ASC') 
                ->get();

        if($data['records']->count() > 0){
            $swRegistro = 1;
        }else{
            $swRegistro = 0;
        }
        $data['swRegistro'] = $swRegistro;
        return view('aliados/act_aliado',$data);  

    }    

    public function aliado_activar($id){
        $aliadoId = $id;
        $data = Aliado::find($aliadoId);

        return view('aliados/aliado_activar',$data);  
    }


    public function change_activar(Request $request){

        //debe obtenerse del usuario logueado de una variable de session.
        $idUSuario = 1;


        $id = $request->id;
        $motivo = '';
        $estatus = $request->estado;
        if($estatus==0){
            $motivo = $request->motivo;  
        }

        $aliado = Aliado::find($id);

        $aliado->estatus = $estatus;
        $aliado->motivo_activacion = $motivo;

        if($estatus==0){
            $aliado->fec_desactivacion = date("Y-m-d H:m:s");
        }else{
            $aliado->fec_activacion = date("Y-m-d H:m:s");     
        }    
        $aliado->save();        

        //Guardar informacion log
        
        
        $logActivar = new Log_Activar;
        $logActivar->id_usuario = $idUSuario;
        $logActivar->id_aliado = $id;
        $logActivar->fec_cambio = date("Y-m-d H:m:s");
        $logActivar->estatus = $estatus;
        $logActivar->motivo = $motivo;
        $logActivar->save();        

        $swRegistro = 0;

        $data['records'] = Aliado::orderBy('nob_aliado','ASC') 
                ->get();

        if($data['records']->count() > 0){
            $swRegistro = 1;
        }else{
            $swRegistro = 0;
        }
        $data['swRegistro'] = $swRegistro;
        return view('aliados/act_aliado',$data);  


    }


    public function log_activar($idCliente){
        $data['records'] = Log_Activar::where('id_aliado','=',$idAliado)
        ->orderBy("fec_cambio","ASC")
        ->get();
        if($data['records']->count() > 0){
            $swRegistro = 1;
        }else{
            $swRegistro = 0;
        }
        $data['swRegistro'] = $swRegistro;

        return view('aliados/log_activar',$data);  
        


    }







}
