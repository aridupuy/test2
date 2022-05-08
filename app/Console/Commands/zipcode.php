<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class zipcode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zipcode:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'load zipcodes to a database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        $response=\App\Models\zipcode::query()->delete();
        $registros=[];
        if ($file = fopen(storage_path("CPdescarga.txt"), "r")) {
            $first=false;
            while(!feof($file)) {
                $line = fgets($file);
                if(!$first){
                    $first=true;
                    continue;
                }
//                $lines[]= strtoupper();
                $zipcodes = new \App\Models\zipcode();
                $zipcodes=$zipcodes->factory(explode("|", strtoupper(utf8_decode(utf8_encode($line)))));
                
                $registros[]=$zipcodes;
            }
//            unset($registros[count($lines)]);
            
            $json  = new createJson();
            $json->createJson($registros);
            fclose($file);
        }   
        
        return 0;
    }
}
