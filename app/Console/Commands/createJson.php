<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class createJson extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zipcode:updateCache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
       $zipcodes = new \App\Models\zipcode();
       $results = $zipcodes->all();
       return $this->createJson($results );
    }
    
    public function createJson($results ){
//         
        $response = [];
        foreach ($results as $row) {
            $response[$row->d_codigo]["zip_code"]= $row->d_codigo;
            $response[$row->d_codigo]["locality"]= strtoupper(($row->d_ciudad));
            $response[$row->d_codigo]["federal_entity"] = array(
                    "key" => (int) ($row->c_estado),
                    "name" => $row->d_estado,
                    "code" => $row->c_CP
                );
            $response[$row->d_codigo]["municipality"] = array(
                    "key" => $row->c_mnpio,
                    "name" => $row->D_mnpio
            );
            $response[$row->d_codigo]["settlements"][]= 
                array(
                    "key" => $row->id_asenta_cpcons,
                    "name" => $row->d_asenta,
                    "zone_type" => $row->d_zona,
                    "settlement_type" => array(
                        "name" => $row->d_tipo_asenta
                    )
                );
        }
//        $json = json_encode($response);
        $serialize= \Opis\Closure\serialize($response);
        file_put_contents(storage_path("zipcodes.serialize"), $serialize);
        return 0;
    }
    
}
