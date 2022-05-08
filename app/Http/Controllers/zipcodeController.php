<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\zipcode;

class zipcodeController extends Controller {

    //
    public function selectAll() {
//        var_dump("aca");
        $json = json_decode(file_get_contents(storage_path("zipcodes.json")));

        return response($json);
    }

    public function selectzipcode($code) {
        if ($file = fopen(storage_path("zipcodes.serialize"), "r")) {
            $arr = unserialize(fgets($file));
            fclose($file);
        }
        else{
            return response(["log"=>"No hay cache cargada"]);
        }
        $results = $arr[$code];

        if(count($results)==0){
           return response(["log"=>"No existe el codigo"]);
        }
        
        return response($results);
    }

}
