<?php

namespace App\Models;
   
use CodeIgniter\Model;

class JurnalModel extends Model
{
    protected $table ='jurnal';
    protected $primaryKey ='id_jurnal';
    protected $allowedFields = ['id_jurnal', 'kode_akun','nama_akun', 'tgl_jurnal', 'posisi_d_c', 'nominal','transaksi'];

    public function getjurnal(){
        return $this->findAll();
    }
} 