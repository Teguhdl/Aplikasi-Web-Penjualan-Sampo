<?php

namespace App\Controllers;

use App\Models\PemodalanModel;
use App\Models\MenuModel;
use App\Models\JurnalModel;
class Pemodalan extends BaseController
{
    // method untuk view
    public function view(){

        $pemodelan_model = model(PemodalanModel::class);
        $menu_model = model(MenuModel::class);
        $datapemodelan = $pemodelan_model->getPemodalan();
        $datamenu = $menu_model->getmenu();

        echo view('Pemodalan/View',[
                'title' => 'View Modal',
                'datapemodalan' => $datapemodelan,
                'datamenu' => $datamenu
            ]
        );     

    }

    // tes
    public function tes(){
        $pemodalan_model = model(PemodalanModel::class);
        echo $pemodalan_model->cekTarikModal(6, 5000);
    }

    // method tambah data
    public function add()
    {
        $pemodalan_model = model(PemodalanModel::class);
        $validation =  \Config\Services::validation();
        $JurnalModel = model(JurnalModel::class);
        
        if($this->request->isAJAX()){
            if(
                $this->validate([
                    'idmenu' => 'required',
                    'besarmodal'  => 'required',
                    'keterangan'  => 'required|min_length[5]',
                    'tanggal'  => 'required',
                    ],
                    [   //List Custom Pesan Error
                        'idmenu' => [
                            'required' => '{field} produk tidak boleh kosong',
                        ],
                        'besarmodal' => [
                            'required' => '{field} tidak boleh kosong',
                        ],
                        'keterangan' => [
                            'required' => '{field} tidak boleh kosong',
                            'min_length' => '{field} harus lebih dari 5 karakter',
                        ],
                        'tanggal' => [
                            'required' => '{field} tidak boleh kosong',
                        ],
                    ]
                )
            )
            {
                
                $idmenu=$this->request->getPost('idmenu');
                $besarmodal = preg_replace( '/[^0-9 ]/i', '', $this->request->getPost('besarmodal'));
                $keterangan = $this->request->getPost('keterangan');
                $tanggal = $this->request->getPost('tanggal');
                
                // simpan data
                $pemodalan_model->inputPemodalan($idmenu,$besarmodal,$keterangan,$tanggal);

                $JurnalModel->save([
                    'kode_akun' => '111',
                    'nama_akun' => 'Kas',
                    'tgl_jurnal'  => $this->request->getPost('tanggal'),
                    'posisi_d_c'  => 'Debet',
                    'nominal'     => preg_replace( '/[^0-9 ]/i', '', $this->request->getPost('besarmodal')),
                    'transaksi'  => 'Pemodalan',
                ]);
    
                $JurnalModel->save([
                    'kode_akun' => '311',
                    'nama_akun' => 'Modal',
                    'tgl_jurnal'  => $this->request->getPost('tanggal'),
                    'posisi_d_c'  => 'Kredit',
                    'nominal'     => preg_replace( '/[^0-9 ]/i', '', $this->request->getPost('besarmodal')),
                    'transaksi'  => 'Pemodalan',
                ]);

                $msg = [
                    'sukses' => 'Data Penambahan Modal Berhasil Ditambahkan',
                 ]; 
                echo json_encode($msg); 
            }else{
                // echo "<script>console.log('masuk sini')</script>";
                $msg = [
                    'error' => [
                        'idmenu'   => $validation->getError('idmenu'),
                        'besarmodal'   => $validation->getError('besarmodal'),
                        'keterangan'   => $validation->getError('keterangan'),
                        'tanggal'   => $validation->getError('tanggal'),
                    ]
                ];     

                echo json_encode($msg); 
            }
            
        //     // 
        }else{
            exit('Maaf tidak dapat diproses');
        }
         
    }

    //method ambil data
    public function ambildata(){
        if($this->request->isAJAX()){
            $pemodelan_model = model(PemodalanModel::class);
            $datapemodalan = $pemodelan_model->getPemodalan();

            $data = [
                'datapemodalan' => $datapemodalan,

             ];  

             $msg = [
                'data' => view('Pemodalan/ViewData', $data)
             ]; 

             echo json_encode($msg); 
        }else{
            exit('Maaf tidak dapat diproses');
        }
    }


    // method ambil data kamar yang akan di edit menggunakan post
    public function ambildataPemodalanById(){
        $pemodelan_model = model(PemodalanModel::class);
        $datapemodelan = $pemodelan_model->getPemodalanBasedOnId($_POST['id']);
        return $this->response->setJSON($datapemodelan);
    }

    // method untuk menghapus pemodalan
    public function delete($id){
        $pemodelan_model = model(PemodalanModel::class);

        $pemodelan_model->deletePemodalan($id);

        $session = session();
        $session->setFlashdata("status_dml", "Sukses Delete");
        return redirect()->to('pemodalan/view');
    }

    
    
}