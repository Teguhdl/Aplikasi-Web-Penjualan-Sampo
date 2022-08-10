<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMachineLearning extends Model
{
    protected $table = 'penjualan';

    public function getAll(){
        $db = db_connect();
        // SELECT * FROM toko_buah.iklan ORDER BY tv ASC
        return $db->table('penjualan')->orderBy('id_sampo', 'ASC')->get()->getResult('array');
    }
    
    
}