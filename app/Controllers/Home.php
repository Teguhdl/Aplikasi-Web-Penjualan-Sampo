<?php

namespace App\Controllers;

use App\Models\AkunModel; //include akun model di dalam controller
use App\Models\menumodel; //include akun model di dalam controller

class Home extends BaseController
{
    public function index()
    {
        // return view('welcome_message');
        // return view('tes');

        $session = session();
        $session->destroy();
        //return redirect()->to('/login');

        return view('login'); // memanggil view di app/views/login.php
    }

    public function ceklogin(){
          //echo $_POST['username']."<br>";
         // echo $_POST['password']."<br>";
         // echo $_GET['username']."-".$_GET['password'];
        
        
        // load model akun model
        $akunmodel = model(AkunModel::class);
        $hasil = $akunmodel->cekUsernamePassword();
        foreach ($hasil as $row) {
            $jml = $row->jml; //atribut hasil query diberi alias jml
        }
        if($jml==0){
            // artinya tidak ada pasangan username dan password yang cocok, kembalikan ke halaman login
            $data['pesan'] = "Pasangan username dan password tidak tepat";
            echo view('login',$data);
        }else{
            // artinya ada pasangan username dan password yang cocok, teruskan ke halaman welcome_message
            // return view('welcome_message');
            
            /* echo view('template/Headertemplate');
            echo view('template/Sidebartemplate');
            echo view('template/Bodytemplate');
            echo view('template/Footertemplate'); */

            // aktifkan session dan simpan username ke dalam session serta buat variabel logged_in
            $session = session();

            //dapatkan waktu last login
			$hasil = $akunmodel->getlastlogin($_POST['username']);
			//kembalikan hasil last_login yang tercatat di database
			foreach ($hasil as $row)
			{
				$lastlogin = $row->last_login;
			}

            // dapatkan kelompok user
			$hasil = $akunmodel->getGroupUser();
			foreach ($hasil as $row)
			{
				$kelompok = $row->user_group;
			}

            $daftarsampo = '0'; //inisialisasi jika avariabel daftar kosan tidak ada maka isinya adalah 0
			if($kelompok=='pemilik'){
				$hasil = $akunmodel->getListProduk($_POST['username']);
				foreach ($hasil as $row)
				{
                    // masukkan ke list daftarkosan 6,7 / 17
					$daftarsampo = $row->daftarsampo;
				}
			}
           $ses_data = [
                'user_name'     => $_POST['username'],
                'logged_in'     => TRUE,
                'lastlogin' => $lastlogin,
                'kelompok' => $kelompok,
                'daftarsampo' => $daftarsampo
              
            ];
            $session->set($ses_data);

            // load data kos dan kirim ke view
            $menu_model = model(menumodel::class);
            $datamenu = $menu_model->getmenu();
            //echo view('template/Headertemplate');
            //echo view('template/Sidebartemplate');
            //echo view('menu/View',
                  //      [
              //              'title' => 'View Menu',
                //            'datamenu' => $datamenu,
                    //    ]
                //    );
            //echo view('template/Footertemplate');        
          return redirect()->to('menu/view');  
        }
        
    }


}
