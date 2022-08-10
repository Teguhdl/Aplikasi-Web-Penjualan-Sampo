<?php

namespace App\Controllers;

use App\Models\supplierModel; //include akun model di dalam controller

class supplier extends BaseController
{
    // method tambah data
    public function add()
    {
        $supplier_model = model(supplierModel::class);
        $validation =  \Config\Services::validation();
        if ($this->request->getMethod() === 'post' && 
            $this->validate([
               'nama_supplier' => 'required|min_length[3]|max_length[50]',
                'alamat'  => 'required',
                'no_telp'  => 'required|exact_length[14]',
                ],
                [   //List Custom Pesan Error
                    'nama_supplier' => [
                        'required' => 'Nama supplier tidak boleh kosong',
                        'min_length' => 'Panjang nama supplier tidak boleh kurang dari 3',
                        'max_length' => 'Panjang nama supplier tidak boleh lebih dari 50',
                    ],
                    'alamat' => [
                        'required' => 'Alamat supplier tidak boleh kosong',
                    ],
                    'no_telp' => [
                        'required' => 'Nomor telepon tidak boleh kosong',
                        'exact_length' => 'Panjang nomor hp harus 12 digit',
                    ],
                ]
            )
            ) 
        {
            // kalau masuk ke sini berarti sudah sesuai dengan rule yang dikehendaki
            // maka langsung masukkan ke database
            $supplier_model->save([
                'nama_supplier' => $this->request->getPost('nama_supplier'),
                'alamat'  => $this->request->getPost('alamat'),
                'no_telp'  => $this->request->getPost('no_telp'),

            ]);

            $session = session();
            $session->setFlashdata("status_dml", "Sukses Input");

            // redirect ke daftar kosan
            return redirect()->to('supplier/view');

        } else {
            echo view('template/Headertemplate');
            echo view('template/Sidebartemplate');
            // pada view Add , jangan lupa kirimkan data title dan hasil pesan validasi
            echo view('supplier/Add', [
                                    'title' => 'Input supplier',
                                    'validation' => $this->validator,
                                ]
                    );
            echo view('template/Footertemplate');           
        }
    }

    // method view daftar kosan
    public function view(){

        $supplier_model = model(supplierModel::class);
        $datasupplier = $supplier_model->getsupplier();
        echo view('template/Headertemplate');
        echo view('template/Sidebartemplate');
        echo view('supplier/View',
                    [
                        'title' => 'View supplier',
                        'datasupplier' => $datasupplier,
                    ]
                 );
        echo view('template/Footertemplate');            
    }

    //method ambil data
    
    // method view daftar supplier dgn menggunakan AJAX
    
    
    // method untuk menghapus kosan
    public function delete($id){
        $supplier_model = model(supplierModel::class);
        $supplier_model->deletesupplier($id);

        $session = session();
        $session->setFlashdata("status_dml", "Sukses Delete");

        return redirect()->to('supplier/view');
    }

    // method untuk melihat data kos berdasarkan id kos
    public function viewData($id){
        $supplier_model = model(supplierModel::class);
        $datasupplier = $supplier_model->getsupplierBasedOnId($id);

        echo view('template/Headertemplate');
        echo view('template/Sidebartemplate');
        echo view('supplier/Edit',
                    [
                        'title' => 'Ubah supplier',
                        'datasupplier' => $datasupplier,
                    ]
                 );
        echo view('template/Footertemplate');         
    }

    // method untuk mengupdate data kos 
    public function update(){
        $supplier_model = model(supplierModel::class);
        $validation =  \Config\Services::validation();
        if ($this->request->getMethod() === 'post' && 
            $this->validate([
               'nama_supplier' => 'required|min_length[3]|max_length[50]',
                'alamat'  => 'required',
                'no_telp'  => 'required|exact_length[14]',
                ],
                [   //List Custom Pesan Error
                    'nama_supplier' => [
                        'required' => 'Nama supplier tidak boleh kosong',
                        'min_length' => 'Panjang nama supplier tidak boleh kurang dari 3',
                        'max_length' => 'Panjang nama supplier tidak boleh lebih dari 50',
                    ],
                    'alamat' => [
                        'required' => 'Alamat supplier tidak boleh kosong',
                    ],
                    'no_telp' => [
                        'required' => 'Nomor telepon tidak boleh kosong',
                        'exact_length' => 'Panjang nomor hp harus 12 digit',
                    ],
                ]
            )
            ) 
        {
            // kalau masuk ke sini berarti sudah sesuai dengan rule yang dikehendaki
            // maka langsung update ke database
            $supplier_model->updatesupplier();

            $session = session();
            $session->setFlashdata("status_dml", "Sukses Update");
            // redirect ke daftar kosan
            return redirect()->to('supplier/view');

        } else {
            echo view('template/Headertemplate');
            echo view('template/Sidebartemplate');
            // pada view Add , jangan lupa kirimkan data title dan hasil pesan validasi
            $datasupplier = $supplier_model->getsupplierBasedOnId($_POST['id_supplier']);
            echo view('supplier/Edit', [
                                    'title' => 'Ubah supplier',
                                    'datasupplier' => $datasupplier,
                                    'validation' => $this->validator,
                                ]
                    );
            echo view('template/Footertemplate');           
        }
    }

    // function untuk tambah pop up
   
    

}
