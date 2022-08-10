<?php

namespace App\Models;

use CodeIgniter\Model;

class penggajianModel extends Model
{
    // atribut tabel diisi dengan nama tabel
    protected $table = 'penggajian';
    protected $primaryKey = 'id_gaji';

    // atribut yang diijinkan untuk diinput menggunakan query builder
    protected $allowedFields = ['id_pegawai','jumlah','tgl_penggajian', ];

    // mendapatkan seluruh data penggajian
    public function getpenggajian() {
        $db = db_connect();
        $query = $db->query('SELECT penggajian.id_gaji, 
        pegawai.nama_pegawai as nama_pegawai,
         penggajian.jumlah,
          penggajian.tgl_penggajian 
          FROM `penggajian` 
          JOIN `pegawai` ON pegawai.id_pegawai = penggajian.id_pegawai');
        $result = $query->getResult(); 
        return $result;
    }

    public function getpegawai() {
        $db = db_connect();
        $query = $db->query('SELECT id_pegawai,nama_pegawai FROM `pegawai`');
        $result = $query->getResult();
        return $result;
    }
}