<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class zipcode extends Model
{
    use HasFactory;
    protected $table = 'zipcode';
    protected $fillable = array("id","d_codigo","d_asenta","d_tipo_asenta","D_mnpio","d_estado","d_ciudad","d_CP","c_estado","c_oficina","c_CP","c_tipo_asenta","c_mnpio","id_asenta_cpcons","d_zona","c_cve_ciudad");
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $connection = 'sqlite';
    public function factory($data)
    {
        // Validate the request...
 
        $zipcode = new self();
        $zipcode->d_codigo=$data[0];
        $zipcode->d_asenta=$data[1];
        $zipcode->d_tipo_asenta=$data[2];
        $zipcode->D_mnpio=$data[3];
        $zipcode->d_estado=$data[4];
        $zipcode->d_ciudad=$data[5];
        $zipcode->d_CP=$data[6];
        $zipcode->c_estado=$data[7];
        $zipcode->c_oficina=$data[8];
        $zipcode->c_CP=$data[9];
        $zipcode->c_tipo_asenta=$data[10];
        $zipcode->c_mnpio=$data[11];
        $zipcode->id_asenta_cpcons=$data[12];
        $zipcode->d_zona=$data[13];
        $zipcode->c_cve_ciudad=$data[14];
        //$zipcode->save();
        return $zipcode;
    }

    


}
