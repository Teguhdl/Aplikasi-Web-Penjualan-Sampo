<?php

namespace App\Models;

use CodeIgniter\Model;

class pelangganmodel extends Model
{
    // atribut tabel diisi dengan nama tabel
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';

    // atribut yang diijinkan untuk diinput menggunakan query builder
    protected $allowedFields = ['nama_pelanggan', 'alamat' , 'no_telp'];

    // method untuk mendapatkan seluruh data pada tabel kos
    public function getpelanggan(){
        return $this->findAll();
    }

    // method untuk menghapus data
    public function deletepelanggan($id){
        $db = db_connect();
        $builder = $db->table('pelanggan');
        $builder->delete(['id_pelanggan' => $id]);
    }

    // method untuk viewData berdasarkan id
    public function getpelangganBasedOnId($id){
        $db = db_connect();
        $query   = $db->query('SELECT * FROM pelanggan WHERE id_pelanggan = ? ', array($id));
        $results = $query->getResult();
        return $results;
    }

    // method untuk updateData kosan
    public function updatepelanggan(){
        $db = db_connect();

        $data = [
            'nama_pelanggan' => $_POST['nama_pelanggan'], //nama adalah atribut database, sedangkan nama_kos adalah nama input formnya
            'alamat'  => $_POST['alamat'],
            'no_telp'  => $_POST['no_telp'],

        ];
        $builder = $db->table('pelanggan');
        $builder->where('id_pelanggan', $_POST['id_pelanggan']);
        $builder->update($data);
    }
    
    
}