<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aliado extends Model
{
    protected $table = "aliados";


    public function listaTipoDocumento(){
    $tipoD = array(
        'J'=>'J',
        'V'=>'V',
        'E'=>'E',
        'G'=>'G',
        'P'=>'P'
    );  
    return $tipoD; 
    }



    
}
