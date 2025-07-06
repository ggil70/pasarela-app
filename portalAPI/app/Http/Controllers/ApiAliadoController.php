<?php

namespace App\Http\Controllers;
use App\Models\Aliado;
use App\Models\Api_Aliado;
use App\Models\Api;
use Illuminate\Support\Facades\Redirect;


use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ApiAliadoController extends Controller
{

    //
    public function asignar_api(){
        $swRegistro = 0;
        $swRegistro = 0;
        $data['records'] = Aliado::where('estatus',1)->orderBy('nob_aliado','asc')->get();
        
        if($data['records']->count() > 0){

            $data['record_apis'] = Api_Aliado::query()
                ->select('api_aliados.*', 'apis.nob_api')
                ->join('apis', 'api_aliados.id_api', '=', 'apis.id')
                ->orderBy('apis.nob_api')
                ->get();
            $swRegistro = 1;
        }else{
            $swRegistro = 0;
        }
        $data['swRegistro'] = $swRegistro;
        return view('apiAliado/asignar_api',$data);
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
                $join->on('apis.id', '=', 'api_aliados.id_api')
                ->where('api_aliados.id_aliado', '=', $aliadoId);
                })
                ->select('apis.id','apis.nob_api', 'api_aliados.id_aliado','api_aliados.id_api', 'api_aliados.id as id_api_aliado')
                ->orderBy('apis.nob_api')
                ->get();
        session()->put('idAliado', $id);
        return view('apiAliado/asignar_api_aliado',$data);
    }


    public function save_api_aliado(Request $request){

        $aliadoId = session()->get('idAliado');
        $data['apis'] = $apis = Api::leftJoin('api_aliados', function ($join) use ($aliadoId) {
                $join->on('apis.id', '=', 'api_aliados.id_api')
                ->where('api_aliados.id_aliado', '=', $aliadoId);
                })
                ->select('apis.id','apis.nob_api', 'api_aliados.id_aliado','api_aliados.id_api', 'api_aliados.id as id_api_aliado')
                ->orderBy('apis.nob_api')
                ->get();

        $valor = 0; 
        foreach ($data['apis'] as $record){
            $checkBox = "s" . $record->id;
            $idApi = $record->id;
            $id_api_aliado = $record->id_api_aliado; 
            if($request->$checkBox == null){
                if($record->id_aliado!=null){
                   $aliadoDel = Api_Aliado::where('id',$id_api_aliado)->first();
                   if($aliadoDel){
                      $aliadoDel->delete();
                   }
                }    
            }else{
                if($record->id_aliado == null){
                    $api_aliado = new Api_Aliado;
                    $api_aliado->id_aliado = $aliadoId;
                    $api_aliado->id_api = $idApi;
                    $api_aliado->fec_afiliacion = date("Y-m-d");
                    $api_aliado->save();
                }    
            }
        } 

        return Redirect::route('asignar_api');
    }




}
