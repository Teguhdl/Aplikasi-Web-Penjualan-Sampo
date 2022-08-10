<?php

namespace App\Models;

use CodeIgniter\Model;

class coamodel extends Model
{
    // atribut tabel diisi dengan nama tabel
    protected $table = 'coa';
    protected $primaryKey = 'kode_coa';

    // atribut yang diijinkan untuk diinput menggunakan query builder
    protected $allowedFields = ['nama_coa', 'header_akun' ,];

    // method untuk mendapatkan seluruh data pada tabel kos
    public function getcoa(){
        return $this->findAll();
    }

    // method untuk menghapus data
    public function deletecoa($id){
        $db = db_connect();
        $builder = $db->table('coa');
        $builder->delete(['kode_coa' => $id]);
    }

    // method untuk viewData berdasarkan id
    public function getcoaBasedOnId($id){
        $db = db_connect();
        $query   = $db->query('SELECT * FROM coa WHERE kode_coa = ? ', array($id));
        $results = $query->getResult();
        return $results;
    }

    // method untuk updateData kosan
    public function updatecoa(){
        $db = db_connect();

        $data = [
            'nama_coa' => $_POST['nama_coa'], //nama adalah atribut database, sedangkan nama_kos adalah nama input formnya
            'header_akun'  => $_POST['header_akun'],

        ];
        $builder = $db->table('coa');
        $builder->where('kode_coa', $_POST['kode_coa']);
        $builder->update($data);
    }
    
}