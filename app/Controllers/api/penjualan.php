<?php

namespace App\Controllers\Api;

use App\Models\sampoModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Penjualan extends ResourceController 
{
    use ResponseTrait;

    public function show($id_sampo = null) {
        $model = new sampoModel();
        $data = $model->find($id_sampo);

        return $this->respond($data);
    }
}

?>