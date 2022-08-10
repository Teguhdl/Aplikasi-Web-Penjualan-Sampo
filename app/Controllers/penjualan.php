<?php
namespace App\Controllers;

use App\Models\penjualanModel;
use App\Models\menuModel;
use App\Models\JurnalModel;

class penjualan extends BaseController
{
	
    // method untuk view data menu yang ada
    public function view(){
        $menu_model = model(menuModel::class);
        $datamenu = $menu_model->getmenu();

       

        echo view('penjualan/View',[
                'title' => 'Pesan menu',
                'datamenu' => $datamenu,
                
            ]
        );     
    }

    public function viewpenjualan()
    {

        $penjualan_model = model(penjualanModel::class);
        $datapenjualan= $penjualan_model->getPenjualan();

        echo view('template/headertemplate');
        echo view('template/sidebartemplate');
        echo view('penjualan/Viewdata',
                    [
                        'title' => 'Data Penjualan',
                        'data_penjualan' => $datapenjualan,
                    ]
                 );
        echo view('template/footertemplate');
    }
    // method view daftar sampo berdasarkan id kos tertentu
    public function add()
    {
        $penjualan_model = model(penjualanModel::class);
        $pelanggan = $penjualan_model->getpelanggan();
        $menu = $penjualan_model->getmenu();
        $sampo =  $penjualan_model->getsampo();
        $JurnalModel = model(JurnalModel::class);
        

        $validation = \Config\Services::validation();
        if ($this->request->getMethod() === 'post' &&
            $this->validate([

                'id_pelanggan' => 'required',
                'id_sampo' => 'required',
                'tgl_jual' => 'required',
                'qty' => 'required',
                'harga_jual' => 'required',
                ],
                [   //List Custom Pesan Error
                    'id_pelanggan' => [
                        'required' => 'Pelanggan tidak boleh kosong',
                    ],
                    'id_sampo' => [
                        'required' => 'Jenis Sampo tidak boleh kosong',
                    ],
                    'tgl_jual' => [
                        'required' => 'Tanggal tidak boleh kosong',
                    ],
                    'qty' => [
                        'required' => 'qty tidak boleh kosong',
                    ],
                    'harga_jual' => [
                        'required' => 'harga tidak boleh kosong',
                    ],
                ]
            )
            )

        {
            
            $penjualan_model->save([
                'id_pelanggan' => $this->request->getPost('id_pelanggan'),
                'id_sampo' => $this->request->getPost('id_sampo'),             
                'tgl_jual'  => $this->request->getPost('tgl_jual'),
                'qty'  => $this->request->getPost('qty'),
                'harga_jual'  => $this->request->getPost('harga_jual'),
            ]);

            $JurnalModel->save([
                'kode_akun' => '111',
                'nama_akun' => 'Kas',
                'tgl_jurnal'  => $this->request->getPost('tgl_jual'),
                'posisi_d_c'  => 'Debet',
                'nominal' => $this->request->getPost('harga_jual'),
                'transaksi'  => 'Penjualan',
            ]);

            $JurnalModel->save([
                'kode_akun' => '411',
                'nama_akun' => 'Penjualan',
                'tgl_jurnal'  => $this->request->getPost('tgl_jual'),
                'posisi_d_c'  => 'Kredit',
                'nominal' =>$this->request->getPost('harga_jual'),
                'transaksi'  => 'Penjualan',
            ]);


            $session = session();
            $session->setFlashdata("pesan", "Berhasil Menambahkan");
            // redirect ke daftar kosan
            return redirect()->to('penjualan/viewpenjualan');

        } else {
            echo view('template/headertemplate');
            echo view('template/sidebartemplate');
            // pada view Add , jangan lupa kirimkan data title dan hasil pesan validasi
            echo view('penjualan/add', [
                                    'title' => 'Input Penjualan',
                                    'validation' => $this->validator,
                                    'menu' => $menu,
                                    'sampo' => $sampo,
                                    'pelanggan' => $pelanggan,
                                    // 'validation' => $this->validator,
                                ]
                    );
            echo view('template/footertemplate');        
        }
    }
}  
