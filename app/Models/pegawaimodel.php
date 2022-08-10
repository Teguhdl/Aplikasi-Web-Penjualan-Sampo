<?php

namespace App\Models;

use CodeIgniter\Model;

class pegawaimodel extends Model
{
    // atribut tabel diisi dengan nama tabel
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';

    // atribut yang diijinkan untuk diinput menggunakan query builder
    protected $allowedFields = ['nama_pegawai', 'alamat' , 'no_telp'];

    // method untuk mendapatkan seluruh data pada tabel kos
    public function getpegawai(){
        return $this->findAll();
    }

    // method untuk menghapus data
    public function deletepegawai($id){
        $db = db_connect();
        $builder = $db->table('pegawai');
        $builder->delete(['id_pegawai' => $id]);
    }

    // method untuk viewData berdasarkan id
    public function getpegawaiBasedOnId($id){
        $db = db_connect();
        $query   = $db->query('SELECT * FROM pegawai WHERE id_pegawai = ? ', array($id));
        $results = $query->getResult();
        return $results;
    }

    // method untuk updateData kosan
    public function updatepegawai(){
        $db = db_connect();

        $data = [
            'nama_pegawai' => $_POST['nama_pegawai'], //nama adalah atribut database, sedangkan nama_kos adalah nama input formnya
            'alamat'  => $_POST['alamat'],
            'no_telp'  => $_POST['no_telp'],

        ];
        $builder = $db->table('pegawai');
        $builder->where('id_pegawai', $_POST['id_pegawai']);
        $builder->update($data);
    }
    
}