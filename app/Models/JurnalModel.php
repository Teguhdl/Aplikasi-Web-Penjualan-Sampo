<?php

namespace App\Models;
   
use CodeIgniter\Model;

class JurnalModel extends Model
{
    protected $table ='jurnal';
    protected $primaryKey ='id_jurnal';
    protected $allowedFields = ['id_jurnal', 'kode_akun','nama_akun', 'tgl_jurnal', 'posisi_d_c', 'nominal','transaksi'];

  
    function laporan_periode($tanggal1,$tanggal2)
    {
        $db = db_connect();
        $query=$db->query("SELECT * FROM jurnal
        WHERE tgl_jurnal between '$tanggal1' and '$tanggal2'
        group by id_jurnal");
        $result = $query->getresult('array');
        return $result;
    }
    function laporan_default()
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM jurnal
        group by id_jurnal');
        $result = $query->getresult('array');
        return $result;
    }

} 