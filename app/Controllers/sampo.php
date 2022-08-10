<?php

namespace App\Controllers;

use App\Models\sampoModel; //include sampo model di dalam controller
use App\Models\menuModel; //include menu model di dalam controller

class sampo extends BaseController
{
    // method tambah data
    public function add()
    {
        $sampo_model = model(sampoModel::class);
        $validation =  \Config\Services::validation();
        
        if($this->request->isAJAX()){
            if(
                $this->validate([  
                    'ukuran'  => 'required',
                    'harga'  => 'required',
                    'stok'=> 'required',
                    ],
                    [   //List Custom Pesan Error
                        'ukuran' => [
                            'required' => '{field} tidak boleh kosong',
                        ],
                        'harga' => [
                            'required' => '{field} tidak boleh kosong',
                        ],
                        'stok' => [
                            'required' => '{field} tidak boleh kosong',
                        ],
                    ]
                )
            )
            {
                
                // $sampo_model->updatesampo();
                $idmenu = $this->request->getPost('idmenuhidden'); 
                $ukuran = $this->request->getPost('ukuran');
                $harga = preg_replace( '/[^0-9 ]/i', '', $_POST['harga']);
                $stok = $this->request->getPost('stok');
                // simpan data
                $sampo_model->save([
                    'id_produk' => $idmenu,
                    'ukuran'  => $ukuran,
                    'harga'  => $harga,
                    'stok'  => $stok,
                ]);

                $msg = [
                    'sukses' => 'Data sampo Berhasil Ditambah',
                 ]; 
                echo json_encode($msg); 
            }else{
                $msg = [
                    'error' => [
                        'ukuran'   => $validation->getError('ukuran'),
                        'harga'   => $validation->getError('harga'),
                        'stok'   => $validation->getError('stok'),
                    ]
                ];     
                echo json_encode($msg); 
            }
            
            // 
        }else{
            exit('Maaf tidak dapat diproses');
        }
    }

    public function update()
    {
        $sampo_model = model(sampoModel::class);
        $validation =  \Config\Services::validation();
        if($this->request->isAJAX()){
            if(
                $this->validate([
                    'ukuran'  => 'required',
                    'harga'  => 'required',
                    'stok' => 'required',
                    ],
                    [   //List Custom Pesan Error
                        'ukuran' => [
                            'required' => '{field} tidak boleh kosong',
                        ],
                        'harga' => [
                            'required' => '{field} tidak boleh kosong',
                        ],
                        'stok' => [
                            'required' => '{field} tidak boleh kosong',
                        ],
                    ]
                )
            )
            {
                
                // $sampo_model->updatesampo();
                $idsampo = $this->request->getPost('idsampohidden');
                $idmenu = $this->request->getPost('idmenuhidden');
                $ukuran = $this->request->getPost('ukuran');
                $harga = preg_replace( '/[^0-9 ]/i', '', $_POST['harga']);
                $stok =  $this->request->getPost('stok');

                $sampo_model->updatesampo($idsampo,$idmenu,$ukuran,$harga,$stok);
                $msg = [
                    'sukses' => 'Data sampo Berhasil Disimpan',
                 ]; 
                echo json_encode($msg); 
            }else{
                $msg = [
                    'error' => [
                        'ukuran'   => $validation->getError('ukuran'),
                        'harga'   => $validation->getError('harga'),
                        'stok'   => $validation->getError('stok'),
                    ]
                ];     
                echo json_encode($msg); 
            }
            
            // 
        }else{
            exit('Maaf tidak dapat diproses');
        }

    }

    // method view daftar sampo berdasarkan id kos tertentu
    public function viewByIdproduk($id){

        $sampo_model = model(sampoModel::class);
        $menu_model = model(menuModel::class);
        

        $datamenu = $menu_model->getmenuBasedOnId($id);

        foreach ($datamenu as $row) {
            $id_produk = $row->id_produk; 
            $nama_produk = $row->nama_produk; 
        }

        $datasampo = $sampo_model->getsampoByIdmenu($id);

        

        echo view('sampo/View',[
                'title' => 'View sampo '.$nama_produk,
                'datamenu' => $datamenu,
                'datasampo' => $datasampo,
                'idmenu' => $id_produk,
                'idproduk' => $id_produk,
                'namamenu' => $nama_produk,
               
            ]
        );     
    }

    public function tes(){
        $sampo_model = model(sampoModel::class);
        $datasampo = $sampo_model->getsampo();

        $data = [
            'tampildata' => $datasampo
         ];  

         $msg = [
            'data' => view('sampo/ViewData', $data)
         ]; 

         echo json_encode($msg); 
    }

    // method ambil data sampo yang akan di edit
    public function ambildatasampoByIdsampo($id_sampo){
        $sampo_model = model(sampoModel::class);
        $datasampo = $sampo_model->getsampoBasedOnId($id_sampo);
        $data['sampo'] = $datasampo;
        return $this->response->setJSON($data);
    }

    // method ambil data sampo yang akan di edit menggunakan post
    public function ambildatasampoByIdsampoPost(){
        $sampo_model = model(sampoModel::class);
        $datasampo = $sampo_model->getsampoBasedOnId($_POST['id']);
        return $this->response->setJSON($datasampo);
    }

    //method ambil data
    public function ambildata($id){
        if($this->request->isAJAX()){
            $sampo_model = model(sampoModel::class);
            $datasampo = $sampo_model->getsampoByIdmenu($id);

            $data = [
                'tampildata' => $datasampo,

             ];  

             $msg = [
                'data' => view('sampo/ViewData', $data)
             ]; 

             echo json_encode($msg); 
        }else{
            exit('Maaf tidak dapat diproses');
        }
    }

    // method untuk melihat data kos berdasarkan id kos
    public function viewData($id){
        $sampo_model = model(sampoModel::class);
        $datasampo = $sampo_model->getsampoBasedOnId($id);

        $menu_model = model(menuModel::class);
        $datamenu = $menu_model->getmenuBasedOnId($id);

        foreach ($datamenu as $row) {
            $id_produk = $row->id_produk; 
            $nama_produk = $row->nama_produk; 
        }
        echo view('menu/Edit',
                    [
                        'title' => 'Ubah sampo '.$nama_produk,
                        'datamenu' => $datamenu,
                        'datasampo' => $datasampo,
                        'namamenu' => $nama_produk
                    ]
                 );       
    }

    // function untuk tambah pop up
    public function addPopUp($id){
        if($this->request->isAJAX()){

            $sampo_model = model(sampoModel::class);
            $menu_model = model(menuModel::class);
            $datamenu = $menu_model->getmenuBasedOnId($id);

            foreach ($datamenu as $row) {
                $id_produk = $row->id_produk; 
                $nama_produk = $row->nama; 
            }

            $datasampo = $sampo_model->getsampoByIdmenu($id);

            $data = [
                'datasampo' => $datasampo,
                'datamenu' => $datamenu,
             ]; 

            $msg = [
                'data' => view('sampo/modaladd',$data)
             ];  
             echo json_encode($msg); 
        }else{
            exit('Maaf tidak dapat diproses');
        }
    }

    // fungsi untuk proses tambah pop up
    public function prosesAdd($idproduk){
        if($this->request->isAJAX()){
            $validation =  \Config\Services::validation();
            $sampo_model = model(sampoModel::class);

            if(! $this->validate([
                    
                    'ukuran'  => 'required',
                    'harga'  => 'required',
                    'stok'  => 'required',
                    ],
                    [   //List Custom Pesan Error
                        'ukuran' => [
                            'required' => '{field}  tidak boleh kosong',
                        ],
                        'harga' => [
                            'required' => '{field}  tidak boleh kosong',
                        ],
                        'stok' => [
                            'required' => '{field}  tidak boleh kosong',
                        ],
                        
                    ]
                )
            ){
                // jika ada error maka kembalikan ke modal
               $msg = [
                   'error' => [
                         'ukuran'   => $validation->getError('ukuran'),
                         'harga'   => $validation->getError('harga'),
                         'stok'   => $validation->getError('stok'),
                   ]
                ];  
                echo json_encode($msg);   
            }else{
                // jika tidak ada error maka insert ke database
                $sampo_model->save([
                    'ukuran'  => $this->request->getPost('ukuran'),
                    'harga'  => preg_replace( '/[^0-9 ]/i', '', $this->request->getPost('harga')),
                    'stok'  => $this->request->getPost('stok'),
                ]);

                $msg = [
                    'sukses' => 'Data Penghuni Berhasil Disimpan'
                 ];  
                 echo json_encode($msg);   
    
            }    

        }else{
            exit('Maaf tidak dapat diproses');
        }
    }

    // method untuk menghapus menu
    public function delete($id){
        $sampo_model = model(sampoModel::class);

        // sebelum dihapus dapatkan id kos dulu
        $datasampo = $sampo_model->getsampoBasedOnId($id);
        foreach ($datasampo as $row) {
            $id_produk = $row['id_produk']; 
        }

        $sampo_model->deletesampo($id);

        $session = session();
        $session->setFlashdata("status_dml", "Sukses Delete");
        // kembalikan ke halaman view kos berdasarkan id kos
        return redirect()->to('sampo/viewByIdproduk/'.$id_produk);
    }

}