<?php

namespace App\Models;

use CodeIgniter\Model;

class PemodalanModel extends Model
{
    // atribut tabel diisi dengan nama tabel
    protected $table = 'pemodalan';

    // mendapatkan seluruh data pemodalan
    public function getPemodalan(){
        $db = db_connect();
        $query   = $db->query('SELECT a.*,b.nama_produk as nama_produk FROM pemodalan a JOIN menu b ON (a.id_produk=b.id_produk)');
        $results = $query->getResult('array');
        return $results;
    }

    // mendapatkan data pemodalan berdasarkan id
    public function getPemodalanBasedOnId($id){
        $db = db_connect();
        $query   = $db->query('SELECT a.*,b.nama_produk as nama_produk FROM pemodalan a JOIN menu b ON (a.id_produk=b.id_produk) WHERE a.id_transaksi = ?', array($id));
        $results = $query->getResult('array');
        return $results;
    }

    // input data
    public function inputPemodalan($idmenu,$besarmodal,$keterangan,$tanggal){
        $db = db_connect();
        //mendapaatkan id_transaksi terakhir dari seluruh transaksi
        $dbResult = $db->query("SELECT IFNULL(MAX(id_transaksi),0) as id_transaksi from pemodalan");

        $hasil = $dbResult->getResult();
        //cacah hasilnya
        foreach ($hasil as $row)
        {
            $id_transaksi = $row->id_transaksi;
        }

        $id_transaksi = $id_transaksi+1; //naikkan 1 untuk id baru modal yang dimasukkan
        
        $sql = "INSERT INTO pemodalan SET id_transaksi = ?, besar=?, nama=?, waktu=?, id_produk=? ";
        $hasil = $db->query($sql, array($id_transaksi, $besarmodal, $keterangan, $tanggal, $idmenu));
        
        //masukkan ke jurnal
       
    }

    // method untuk menghapus data
    public function deletePemodalan($id){
        $db = db_connect();
        $builder = $db->table('pemodalan');
        $builder->delete(['id_transaksi' => $id]);

        // delete juga tabel di jurnal dan 
       
    }

    //cek apakah modal yang ditarik lebih besar dari moda ayg ada di database atau tidak
   

    
}