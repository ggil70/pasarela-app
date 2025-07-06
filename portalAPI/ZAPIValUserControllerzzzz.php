<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;
use App\Models\Aliado;
use App\Models\Api;
use App\Models\Api_Aliado;


class ZAPIValUserController extends Controller
{
    //

    public function validateUser(Request $request){
        $login = strtoupper($request->login);
        $password = $request->password;
        $apiKey = $request->apikey;



        if(!empty($login) && !empty($password)){

            $consulta = Usuario::query()
                ->select([
                    'aliados.*',
                    'usuarios.id as id_usuario',
                    'usuarios.nob_usuario',
                    'usuarios.ape_usuario',
                    'usuarios.email_usuario',
                ])
                ->join('aliados', 'usuarios.id_aliado', '=', 'aliados.id')
                ->where('usuarios.login', $login)
                ->where('usuarios.password', $password)
                ->where('usuarios.estatus', 1)
                ->where('usuarios.id_rol', 2)
                ->where('aliados.apikey', $apiKey)
                ->first();


            if($consulta){
                $consultaApi = Api_Aliado::query()
                    ->select([
                        'api_aliados.*',
                        'apis.nob_api',
                        'apis.id_tipo_api',
                        'tipo_apis.nob_tipo_api',
                    ])
                    ->join('apis', 'api_aliados.id_api', '=', 'apis.id')
                    ->join('tipo_apis', 'apis.id_tipo_api', '=', 'tipo_apis.id')
                    ->where('api_aliados.id_aliado', 1)
                    ->get();


                $arrayApi = [];

                foreach($consultaApi as $records){
                    $arrayApi[] = [
                        'id_api'=> $records->id_api,
                        'nob_api'=> $records->nob_api,
                        'id_tipo_api'=> $records->nob_api,
                        'nob_tipo_api'=> $records->nob_tipo_api,
                    ];
                }
         
                $arrayUser = ['id_usuario'=>$consulta->id_usuario,
                              'nob_usuario'=>$consulta->nob_usuario,
                              'ape_usuario'=>$consulta->ape_usuario,
                              'id_aliado' => $consulta->id,
                              'nob_aliado' => $consulta->nob_aliado,
                              'rif_aliado' => $consulta->rif_aliado,
                              'tel_aliado' => $consulta->tel_aliado,
                              'url_logo' => $consulta->logo,
                              'apis'=>$arrayApi,                              
                              'error' => 0,
                ];
            }else{
                $arrayUser = ['error'=>'1000',
                              'errorMensaje'=>'El usuario a validar no existe',
                             ];
            } 
        }else{
            $arrayUser = ['error'=>'1001',
                          'errorMensaje'=>'Login o Password vacio',
            ];
        }



        return response()->json($arrayUser); 

    }    

}
