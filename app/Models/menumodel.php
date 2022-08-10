<?php

namespace App\Models;

use CodeIgniter\Model;

class menumodel extends Model
{
    // atribut tabel diisi dengan nama tabel
    protected $table = 'menu';
    protected $primaryKey = 'id_produk';

    // atribut yang diijinkan untuk diinput menggunakan query builder
    protected $allowedFields = ['nama_produk', 'harga_produk'];

    // method untuk mendapatkan seluruh data pada tabel kos
    public function getmenu(){
        $db = db_connect();
        // bedakan querynya jika session daftarkosan ada isinya berarti dia pemilik
        // maka diberikan tambahan query untuk memfilter daftar kosan sesuai dengan pemiliknya
        $session = session();
        if($session->get('daftarsampo')!='0'){
            $query   = $db->query("SELECT a.*,
                                  (
                                        SELECT COUNT(*) 
          FROM sampo
         WHERE id_produk = a.id_produk
         ) as jmlh
        FROM menu a
              WHERE id_produk IN (".$session->get('daftarsampo').")
                            "
                    );
        }else{
            $query   = $db->query('SELECT a.*,
            (
             SELECT COUNT(*) 
         FROM sampo
         WHERE id_produk = a.id_produk
         ) as jmlh
                 FROM menu a'
                    );
        }
        $results = $query->getResult('array'); //kembalikan dalam bentuk array bukan obyek
        return $results;
    }

    // method untuk menghapus data
    public function deletemenu($id){
        $db = db_connect();
        $builder = $db->table('menu');
        $builder->delete(['id_produk' => $id]);
    }

    // method untuk viewData berdasarkan id
    public function getmenuBasedOnId($id){
        $db = db_connect();
        $query   = $db->query('SELECT * FROM menu WHERE id_produk = ? ', array($id));
        $results = $query->getResult();
        return $results;
    }

    // method untuk updateData kosan
    public function updatemenu(){
        $db = db_connect();

        $data = [
            'nama_produk' => $_POST['nama_produk'], //nama adalah atribut database, sedangkan nama_kos adalah nama input formnya
            'harga_produk'  => $_POST['harga_produk'],
        ];
        $builder = $db->table('menu');
        $builder->where('id_produk', $_POST['id_produk']);
        $builder->update($data);
    }
    
}