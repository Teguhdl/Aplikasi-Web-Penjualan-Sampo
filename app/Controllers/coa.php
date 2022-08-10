<?php

namespace App\Controllers;

use App\Models\coaModel; //include akun model di dalam controller

class coa extends BaseController
{
    // method tambah data
    public function add()
    {
        $coa_model = model(coaModel::class);
        $validation =  \Config\Services::validation();
        if ($this->request->getMethod() === 'post' && 
            $this->validate([
               'nama_coa' => 'required|min_length[3]|max_length[50]',
                'header_akun'  => 'required',

                ],
                [   //List Custom Pesan Error
                    'nama_coa' => [
                        'required' => 'Nama coa tidak boleh kosong',
                        'min_length' => 'Panjang nama coa tidak boleh kurang dari 3',
                        'max_length' => 'Panjang nama coa tidak boleh lebih dari 50',
                    ],
                    'header_akun' => [
                        'required' => 'header_akun coa tidak boleh kosong',
                    ],
                    
                ]
            )
            ) 
        {
            // kalau masuk ke sini berarti sudah sesuai dengan rule yang dikehendaki
            // maka langsung masukkan ke database
            $coa_model->save([
                'nama_coa' => $this->request->getPost('nama_coa'),
                'header_akun'  => $this->request->getPost('header_akun'),
            

            ]);

            $session = session();
            $session->setFlashdata("status_dml", "Sukses Input");

            // redirect ke daftar kosan
            return redirect()->to('coa/view');

        } else {
            echo view('template/Headertemplate');
            echo view('template/Sidebartemplate');
            // pada view Add , jangan lupa kirimkan data title dan hasil pesan validasi
            echo view('coa/Add', [
                                    'title' => 'Input coa',
                                    'validation' => $this->validator,
                                ]
                    );
            echo view('template/Footertemplate');           
        }
    }

    // method view daftar kosan
    public function view(){

        $coa_model = model(coaModel::class);
        $datacoa = $coa_model->getcoa();
        echo view('template/Headertemplate');
        echo view('template/Sidebartemplate');
        echo view('coa/View',
                    [
                        'title' => 'View coa',
                        'datacoa' => $datacoa,
                    ]
                 );
        echo view('template/Footertemplate');            
    }

    //method ambil data
    
    // method view daftar coa dgn menggunakan AJAX
    
    
    // method untuk menghapus kosan
    public function delete($id){
        $coa_model = model(coaModel::class);
        $coa_model->deletecoa($id);

        $session = session();
        $session->setFlashdata("status_dml", "Sukses Delete");

        return redirect()->to('coa/view');
    }

    // method untuk melihat data kos berdasarkan id kos
    public function viewData($id){
        $coa_model = model(coaModel::class);
        $datacoa = $coa_model->getcoaBasedOnId($id);

        echo view('template/Headertemplate');
        echo view('template/Sidebartemplate');
        echo view('coa/Edit',
                    [
                        'title' => 'Ubah coa',
                        'datacoa' => $datacoa,
                    ]
                 );
        echo view('template/Footertemplate');         
    }

    // method untuk mengupdate data kos 
    public function update(){
        $coa_model = model(coaModel::class);
        $validation =  \Config\Services::validation();
        if ($this->request->getMethod() === 'post' && 
            $this->validate([
               'nama_coa' => 'required|min_length[3]|max_length[50]',
                'header_akun'  => 'required',

                ],
                [   //List Custom Pesan Error
                    'nama' => [
                        'required' => 'Nama coa tidak boleh kosong',
                        'min_length' => 'Panjang nama coa tidak boleh kurang dari 3',
                        'max_length' => 'Panjang nama coa tidak boleh lebih dari 50',
                    ],
                    'header_akun' => [
                        'required' => 'header_akun coa tidak boleh kosong',
                    ],
                    
                ]
            )
            ) 
        {
            // kalau masuk ke sini berarti sudah sesuai dengan rule yang dikehendaki
            // maka langsung update ke database
            $coa_model->updatecoa();

            $session = session();
            $session->setFlashdata("status_dml", "Sukses Update");
            // redirect ke daftar kosan
            return redirect()->to('coa/view');

        } else {
            echo view('template/Headertemplate');
            echo view('template/Sidebartemplate');
            // pada view Add , jangan lupa kirimkan data title dan hasil pesan validasi
            $datacoa = $coa_model->getcoaBasedOnId($_POST['kode_coa']);
            echo view('coa/Edit', [
                                    'title' => 'Ubah coa',
                                    'datacoa' => $datacoa,
                                    'validation' => $this->validator,
                                ]
                    );
            echo view('template/Footertemplate');           
        }
    }

    // function untuk tambah pop up
   
    

}
