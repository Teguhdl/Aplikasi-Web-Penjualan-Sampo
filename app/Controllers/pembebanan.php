<?php
namespace App\Controllers;

use App\Models\pembebananModel;
use App\Models\menuModel;
use App\Models\JurnalModel;

class pembebanan extends BaseController
{
	

    public function viewpembebanan()
    {

        $pembebanan_model = model(pembebananModel::class);
        $datapembebanan= $pembebanan_model->getPembebanan();

        echo view('template/headertemplate');
        echo view('template/sidebartemplate');
        echo view('pembebanan/Viewdata',
                    [
                        'title' => 'Data Pembebanan',
                        'data_pembebanan' => $datapembebanan,
                    ]
                 );
        echo view('template/footertemplate');
    }
    // method view daftar sampo berdasarkan id kos tertentu
    public function add()
    {
        $pembebanan_model = model(pembebananModel::class);
        $menu = $pembebanan_model->getmenu();
        $JurnalModel = model(JurnalModel::class);

        $validation = \Config\Services::validation();
        if ($this->request->getMethod() === 'post' &&
            $this->validate([

       
                'id_produk' => 'required',
                'nama_beban' => 'required',
                'biaya' => 'required',
                'tgl_bayar' => 'required',
                ],
                [   //List Custom Pesan Error
                    'id_produk' => [
                        'required' => 'Jenis Produk tidak boleh kosong',
                    ],
                    'nama_beban' => [
                        'required' => 'Nama Beban tidak boleh kosong',
                    ],
                    'biaya' => [
                        'required' => 'harga tidak boleh kosong',
                    ],
                    'tgl_bayar' => [
                        'required' => 'harga tidak boleh kosong',
                    ],
                ]
            )
            )
        {
            
            $pembebanan_model->save([
         
                'id_produk' => $this->request->getPost('id_produk'),             
                'nama_beban'  => $this->request->getPost('nama_beban'),
                'biaya'  => $this->request->getPost('biaya'),
                'tgl_bayar'  => $this->request->getPost('tgl_bayar'),
            ]);
            $JurnalModel->save([
                'kode_akun' => '511',
                'nama_akun' => 'Beban',
                'tgl_jurnal'  => $this->request->getPost('tgl_bayar'),
                'posisi_d_c'  => 'Debet',
                'nominal' => $this->request->getPost('biaya'),
                'transaksi'  => 'Pembebanan',
            ]);

            $JurnalModel->save([
                'kode_akun' => '411',
                'nama_akun' => 'Kas',
                'tgl_jurnal'  => $this->request->getPost('tgl_bayar'),
                'posisi_d_c'  => 'Kredit',
                'nominal' =>$this->request->getPost('biaya'),
                'transaksi'  => 'Pembebanan',
            ]);

            $session = session();
            $session->setFlashdata("pesan", "Berhasil Menambahkan");
            // redirect ke daftar kosan
            return redirect()->to('pembebanan/viewpembebanan');

        } else {
            echo view('template/headertemplate');
            echo view('template/sidebartemplate');
            // pada view Add , jangan lupa kirimkan data title dan hasil pesan validasi
            echo view('pembebanan/add', [
                                    'title' => 'Input Pembebanan',
                                    'validation' => $this->validator,
                                    'menu' => $menu,
                                ]
                    );
            echo view('template/footertemplate');        
        }
    }
}   