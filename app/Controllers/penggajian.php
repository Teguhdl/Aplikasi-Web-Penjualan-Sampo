<?php
namespace App\Controllers;

use App\Models\penggajianModel;
use App\Models\menuModel;
use App\Models\JurnalModel;

class penggajian extends BaseController
{
	

    public function viewpenggajian()
    {

        $penggajian_model = model(penggajianModel::class);
        $datapenggajian= $penggajian_model->getpenggajian();

        echo view('template/headertemplate');
        echo view('template/sidebartemplate');
        echo view('penggajian/Viewdata',
                    [
                        'title' => 'Data penggajian',
                        'data_penggajian' => $datapenggajian,
                    ]
                 );
        echo view('template/footertemplate');
    }
    // method view daftar sampo berdasarkan id kos tertentu
    public function add()
    {
        $penggajian_model = model(penggajianModel::class);
        $pegawai = $penggajian_model->getpegawai();
        $JurnalModel = model(JurnalModel::class);
        

        $validation = \Config\Services::validation();
        if ($this->request->getMethod() === 'post' &&
            $this->validate([

                
                'id_pegawai' => 'required',
                'jumlah' => 'required',
                'tgl_penggajian' => 'required',
                ],
                [   //List Custom Pesan Error
                    'id_pegawai' => [
                        'required' => 'Id Pegawai tidak boleh kosong',
                    ],
                    'jumlah' => [
                        'required' => 'Jumlah tidak boleh kosong',
                    ],
                    'tgl_penggajian' => [
                        'required' => 'Tanggal tidak boleh kosong',
                    ],
                   
                ]
            )
            )
        {
            
            $penggajian_model->save([
              
                'id_pegawai' => $this->request->getPost('id_pegawai'),             
                'jumlah'  => $this->request->getPost('jumlah'),
                'tgl_penggajian'  => $this->request->getPost('tgl_penggajian'),
               
            ]);
            $JurnalModel->save([
                'kode_akun' => '513',
                'nama_akun' => 'Beban Gaji',
                'tgl_jurnal'  => $this->request->getPost('tgl_penggajian'),
                'posisi_d_c'  => 'Debet',
                'nominal' => $this->request->getPost('jumlah'),
                'transaksi'  => 'Penggajian',
            ]);

            $JurnalModel->save([
                'kode_akun' => '111',
                'nama_akun' => 'Kas',
                'tgl_jurnal'  => $this->request->getPost('tgl_penggajian'),
                'posisi_d_c'  => 'Kredit',
                'nominal' =>$this->request->getPost('jumlah'),
                'transaksi'  => 'Penggajian',
            ]);

            $session = session();
            $session->setFlashdata("pesan", "Berhasil Menambahkan");
            // redirect ke daftar kosan
            return redirect()->to('penggajian/viewpenggajian');

        } else {
            echo view('template/headertemplate');
            echo view('template/sidebartemplate');
            // pada view Add , jangan lupa kirimkan data title dan hasil pesan validasi
            echo view('penggajian/add', [
                                    'title' => 'Input Penggajian',
                                    'validation' => $this->validator,
                                    'pegawai' => $pegawai,
                                    // 'validation' => $this->validator,
                                ]
                    );
            echo view('template/footertemplate');        
        }
    }
}  
