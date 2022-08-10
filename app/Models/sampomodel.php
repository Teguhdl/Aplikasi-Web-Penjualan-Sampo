<?php

namespace App\Models;

use CodeIgniter\Model;

class sampoModel extends Model
{
    // atribut tabel diisi dengan nama tabel
    protected $table = 'sampo';
    protected $primaryKey = 'id_sampo';

    // atribut yang diijinkan untuk diinput menggunakan query builder
    protected $allowedFields = ['id_produk','ukuran','harga','stok'];

    // method untuk mendapatkan seluruh data pada tabel sampo
    public function getsampo(){
        return $this->findAll();
    }

    // method untuk mendapatkan data kos berdasarkan id tertentu
    public function getsampoByIdmenu($id){
        $db = db_connect();
        $query   = $db->query('SELECT * FROM sampo WHERE id_produk = ? ', array($id));
        $results = $query->getResult('array');
        return $results;
    }

    // method untuk viewData berdasarkan id
    public function getsampoBasedOnId($id){
        $db = db_connect();
        $query   = $db->query('SELECT * FROM sampo WHERE id_sampo = ? ', array($id));
        $results = $query->getResult('array');
        return $results;
    }

    // method untuk menghapus data
    public function deletesampo($id){
        $db = db_connect();
        $builder = $db->table('sampo');
        $builder->delete(['id_sampo' => $id]);
    }

    // method untuk updateData sampo
    public function updatesampo($idsampo,$idproduk,$ukuran,$harga,$stok){
        $db = db_connect();
        $data = [
                
                'id_produk' => $idproduk,
                'ukuran'  => $ukuran,
                'harga'  => $harga,//menghilangkan efek masking
                'stok'  => $stok,  
        ];
        $builder = $db->table('sampo');
        $builder->where('id_sampo', $idsampo);
        $builder->update($data);
    }
}