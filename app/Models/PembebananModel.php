<?php

namespace App\Models;

use CodeIgniter\Model;

class pembebananModel extends Model
{
    // atribut tabel diisi dengan nama tabel
    protected $table = 'pembebanan';
    protected $primaryKey = 'id_beban';

    // atribut yang diijinkan untuk diinput menggunakan query builder
    protected $allowedFields = ['id_produk','nama_beban','biaya','tgl_bayar'];

    // mendapatkan seluruh data pembebanan
    public function getPembebanan() {
        $db = db_connect();
        $query = $db->query('SELECT pembebanan.id_beban, menu.nama_produk as nama_produk , 
        pembebanan.nama_beban as nama_beban ,
        pembebanan.biaya  ,
        pembebanan.tgl_bayar From `pembebanan`
        JOIN `menu` ON menu.id_produk = pembebanan.id_produk');
        $result = $query->getResult(); 
        return $result;
    }
    public function getmenu() {
        $db = db_connect();
        $query = $db->query('SELECT id_produk,nama_produk FROM `menu`');
        $result = $query->getResult();
        return $result;
    }

}