<?php

namespace App\Controllers;

use App\Models\pegawaiModel; //include akun model di dalam controller

class pegawai extends BaseController
{
    // method tambah data
    public function add()
    {
        $pegawai_model = model(pegawaiModel::class);
        $validation =  \Config\Services::validation();
        if ($this->request->getMethod() === 'post' && 
            $this->validate([
               'nama_pegawai' => 'required|min_length[3]|max_length[50]',
                'alamat'  => 'required',
                'no_telp'  => 'required|exact_length[14]',
                ],
                [   //List Custom Pesan Error
                    'nama' => [
                        'required' => 'Nama Pegawai tidak boleh kosong',
                        'min_length' => 'Panjang nama Pegawai tidak boleh kurang dari 3',
                        'max_length' => 'Panjang nama Pegawai tidak boleh lebih dari 50',
                    ],
                    'alamat' => [
                        'required' => 'Alamat Pegawai tidak boleh kosong',
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
            $pegawai_model->save([
                'nama_pegawai' => $this->request->getPost('nama_pegawai'),
                'alamat'  => $this->request->getPost('alamat'),
                'no_telp'  => $this->request->getPost('no_telp'),

            ]);

            $session = session();
            $session->setFlashdata("status_dml", "Sukses Input");

            // redirect ke daftar kosan
            return redirect()->to('pegawai/view');

        } else {
            echo view('template/Headertemplate');
            echo view('template/Sidebartemplate');
            // pada view Add , jangan lupa kirimkan data title dan hasil pesan validasi
            echo view('pegawai/Add', [
                                    'title' => 'Input pegawai',
                                    'validation' => $this->validator,
                                ]
                    );
            echo view('template/Footertemplate');           
        }
    }

    // method view daftar kosan
    public function view(){

        $pegawai_model = model(pegawaiModel::class);
        $datapegawai = $pegawai_model->getpegawai();
        echo view('template/Headertemplate');
        echo view('template/Sidebartemplate');
        echo view('pegawai/View',
                    [
                        'title' => 'View pegawai',
                        'datapegawai' => $datapegawai,
                    ]
                 );
        echo view('template/Footertemplate');            
    }

    //method ambil data
    
    // method view daftar pegawai dgn menggunakan AJAX
    
    
    // method untuk menghapus kosan
    public function delete($id){
        $pegawai_model = model(pegawaiModel::class);
        $pegawai_model->deletepegawai($id);

        $session = session();
        $session->setFlashdata("status_dml", "Sukses Delete");

        return redirect()->to('pegawai/view');
    }

    // method untuk melihat data kos berdasarkan id kos
    public function viewData($id){
        $pegawai_model = model(pegawaiModel::class);
        $datapegawai = $pegawai_model->getpegawaiBasedOnId($id);

        echo view('template/Headertemplate');
        echo view('template/Sidebartemplate');
        echo view('pegawai/Edit',
                    [
                        'title' => 'Ubah pegawai',
                        'datapegawai' => $datapegawai,
                    ]
                 );
        echo view('template/Footertemplate');         
    }

    // method untuk mengupdate data kos 
    public function update(){
        $pegawai_model = model(pegawaiModel::class);
        $validation =  \Config\Services::validation();
        if ($this->request->getMethod() === 'post' && 
            $this->validate([
               'nama_pegawai' => 'required|min_length[3]|max_length[50]',
                'alamat'  => 'required',
                'no_telp'  => 'required|exact_length[14]',
                ],
                [   //List Custom Pesan Error
                    'nama' => [
                        'required' => 'Nama Pegawai tidak boleh kosong',
                        'min_length' => 'Panjang nama Pegawai tidak boleh kurang dari 3',
                        'max_length' => 'Panjang nama Pegawai tidak boleh lebih dari 50',
                    ],
                    'alamat' => [
                        'required' => 'Alamat Pegawai tidak boleh kosong',
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
            $pegawai_model->updatepegawai();

            $session = session();
            $session->setFlashdata("status_dml", "Sukses Update");
            // redirect ke daftar kosan
            return redirect()->to('pegawai/view');

        } else {
            echo view('template/Headertemplate');
            echo view('template/Sidebartemplate');
            // pada view Add , jangan lupa kirimkan data title dan hasil pesan validasi
            $datapegawai = $pegawai_model->getpegawaiBasedOnId($_POST['id_pegawai']);
            echo view('pegawai/Edit', [
                                    'title' => 'Ubah pegawai',
                                    'datapegawai' => $datapegawai,
                                    'validation' => $this->validator,
                                ]
                    );
            echo view('template/Footertemplate');           
        }
    }

    // function untuk tambah pop up
   
    

}
