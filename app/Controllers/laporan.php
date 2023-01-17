<?php

namespace App\Controllers;

use App\Models\JurnalModel; 


class Laporan extends BaseController
{
    // public function viewjurnalumum(){ 

    //     $jurnalmodel = model(JurnalModel::class);
    //     $data = $jurnalmodel->getjurnal();
    //     echo view('template/headertemplate');
    //     echo view('template/sidebartemplate');
    //     echo view('Laporan/JurnalUmum',
    //                 [
    //                     'title' => 'Laporan Jurnal Umum',
    //                     'data' => $data,
    //                 ]
    //             );      
    //             echo view('template/footertemplate');    
    // }

    public function index()
    {
        $jurnalmodel = model(JurnalModel::class);
        if(isset($_POST['submit']))
        {
            $tanggal1 = $this->request->getPost('tanggal1');
            $tanggal2 = $this->request->getPost('tanggal2');
            $data = $jurnalmodel->laporan_periode($tanggal1,$tanggal2);
           echo view('template/headertemplate');
           echo view('template/sidebartemplate');
           echo view('laporan/JurnalUmum',[
            'title' => 'Laporan Jurnal Umum',
              'data' => $data,
          ]);
           echo view('template/footertemplate');
        }
        else 
        {
      $jurnalmodel = model(JurnalModel::class);
      $data= $jurnalmodel->laporan_default();
       echo view('template/headertemplate');
       echo view('template/sidebartemplate');
       echo view('laporan/JurnalUmum', [
                           'title' => 'Laporan Jurnal Umum',
                             'data' => $data,
                         ]);
       echo view('template/footertemplate');
        }
    }
} 

    

  

