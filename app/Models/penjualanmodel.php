<?php

namespace App\Models;

use CodeIgniter\Model;

class penjualanModel extends Model
{
    // atribut tabel diisi dengan nama tabel
    protected $table = 'penjualan';
    protected $primaryKey = 'id_jual';

    // atribut yang diijinkan untuk diinput menggunakan query builder
    protected $allowedFields = ['id_sampo','id_pelanggan','tgl_jual','qty','harga_jual' ];

    // mendapatkan seluruh data penjualan
    public function getPenjualan() {
        $db = db_connect();
        $query = $db->query('SELECT penjualan.id_jual,
         menu.nama_produk as nama_produk , 
         pelanggan.nama_pelanggan as nama_pelanggan ,
         sampo.ukuran as ukuran,
         sampo.harga as harga_sampo, 
          penjualan.qty, 
          penjualan.harga_jual 
          FROM `penjualan` 
          JOIN `sampo` ON sampo.id_sampo = penjualan.id_sampo 
          JOIN `pelanggan` ON pelanggan.id_pelanggan = penjualan.id_pelanggan
          JOIN `menu` ON menu.id_produk = sampo.id_produk');
        $result = $query->getResult(); 
        return $result;
    }
    public function getmenu() {
        $db = db_connect();
        $query = $db->query('SELECT id_produk,nama_produk FROM `menu`');
        $result = $query->getResult();
        return $result;
    }

    public function getsampo() {
        $db = db_connect();
        $query = $db->query('SELECT sampo.id_sampo, sampo.id_produk , sampo.ukuran, sampo.harga, sampo.harga, menu.nama_produk as nama_produk FROM `sampo` JOIN `menu` ON menu.id_produk = sampo.id_produk');
        $result = $query->getResult();
        return $result;
    }

    public function getpelanggan() {
        $db = db_connect();
        $query = $db->query('SELECT id_pelanggan,nama_pelanggan FROM `pelanggan`');
        $result = $query->getResult();
        return $result;
    }
}