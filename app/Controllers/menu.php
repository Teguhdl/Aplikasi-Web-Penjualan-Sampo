<?php

namespace App\Controllers;

use App\Models\menumodel; //include akun model di dalam controller

class menu extends BaseController
{
    // method tambah data
    public function add()
    {
        $menu_model = model(menumodel::class);
        $validation =  \Config\Services::validation();
        if ($this->request->getMethod() === 'post' && 
            $this->validate([
                'nama_produk' => 'required|min_length[3]|max_length[50]',
                'harga_produk'  => 'required|numeric',
                ],
                [   //List Custom Pesan Error
                    'nama_produk' => [
                        'required' => 'Nama produk tidak boleh kosong',
                        'min_length' => 'Panjang nama Produk tidak boleh kurang dari 3',
                        'max_length' => 'Panjang nama Produk tidak boleh lebih dari 50',
                    ],
                    'harga_produk' => [
                        'required' => 'Harga produk tidak boleh kosong',
                    ],
                ]
            )
            ) 
        {
            // kalau masuk ke sini berarti sudah sesuai dengan rule yang dikehendaki
            // maka langsung masukkan ke database
            $menu_model->save([
                'nama_produk' => $this->request->getPost('nama_produk'),
                'harga_produk'  => $this->request->getPost('harga_produk'),
            ]);

            $session = session();
            $session->setFlashdata("status_dml", "Sukses Input");

            // redirect ke daftar menu
            return redirect()->to('menu/view');

        } else {
            echo view('template/Headertemplate');
            echo view('template/Sidebartemplate');
            // pada view Add , jangan lupa kirimkan data title dan hasil pesan validasi
            echo view('menu/add', [
                                    'title' => 'Input Menu',
                                    'validation' => $this->validator,
                                ]
                    );
            echo view('template/Footertemplate');        
        }
    }

    // method view daftar menu
    public function view(){

        $menu_model = model(menumodel::class);
        $datamenu = $menu_model->getmenu();
        echo view('template/Headertemplate');
        echo view('template/Sidebartemplate');
        echo view('menu/view',
                    [
                        'title' => 'View Menu',
                        'datamenu' => $datamenu,
                    ]
                 );
        echo view('template/Footertemplate');            
    }

    public function view2(){

        $menu_model = model(menumodel::class);
        $datamenu = $menu_model->getmenu();
        echo view('template/Headertemplate');
        echo view('template/Sidebartemplate');
        echo view('menu/view2',
                    [
                        'title' => 'View Menu',
                        'datamenu' => $datamenu,
                    ]
                 );
        echo view('template/Footertemplate');            
    }
    
    // method untuk menghapus menu
    public function delete($id){
        $menu_model = model(menumodel::class);
        $menu_model->deletemenu($id);

        $session = session();
        $session->setFlashdata("status_dml", "Sukses Delete");

        return redirect()->to('menu/view');
    }

    // method untuk melihat data kos berdasarkan id kos
    public function viewData($id){
        $menu_model = model(menumodel::class);
        $datamenu = $menu_model->getmenuBasedOnId($id);

        echo view('template/Headertemplate');
        echo view('template/Sidebartemplate');
        echo view('menu/edit',
                    [
                        'title' => 'Ubah menu',
                        'datamenu' => $datamenu,
                    ]
                 );
        echo view('template/Footertemplate');                
    }

    // method untuk mengupdate data kos 
    public function update(){
        $menu_model = model(menumodel::class);
        $validation =  \Config\Services::validation();
        if ($this->request->getMethod() === 'post' && 
            $this->validate([
                'nama_produk' => 'required|min_length[3]|max_length[50]',
                'harga_produk'  => 'required',
                ],
                [   //List Custom Pesan Error
                    'nama_produk' => [
                        'required' => 'nama Produk tidak boleh kosong',
                        'min_length' => 'Panjang nama Produk tidak boleh kurang dari 3',
                        'max_length' => 'Panjang nama Produk tidak boleh lebih dari 50',
                    ],
                    'harga_produk' => [
                        'required' => 'harga Produk tidak boleh kosong',
                    ],
                ]
            )
            ) 
        {
            // kalau masuk ke sini berarti sudah sesuai dengan rule yang dikehendaki
            // maka langsung update ke database
            $menu_model->updatemenu();

            $session = session();
            $session->setFlashdata("status_dml", "Sukses Update");
            // redirect ke daftar menu
            return redirect()->to('menu/view');

        } else {
            echo view('template/Headertemplate');
            echo view('template/Sidebartemplate');
            // pada view Add , jangan lupa kirimkan data title dan hasil pesan validasi
            $datamenu = $menu_model->getmenuBasedOnId($_POST['id_produk']);
            echo view('menu/Edit', [
                                    'title' => 'Ubah Menu',
                                    'datamenu' => $datamenu,
                                    'validation' => $this->validator,
                                ]
                    );
            echo view('template/Footertemplate');               
        }
    }

}
