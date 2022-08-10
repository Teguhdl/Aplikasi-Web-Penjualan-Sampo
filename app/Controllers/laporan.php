<?php

namespace App\Controllers;

use App\Models\JurnalModel; 


class Laporan extends BaseController
{
    public function viewjurnalumum(){ 

        $jurnalmodel = model(JurnalModel::class);
        $data = $jurnalmodel->getjurnal();
        echo view('template/headertemplate');
        echo view('template/sidebartemplate');
        echo view('Laporan/JurnalUmum',
                    [
                        'title' => 'Laporan Jurnal Umum',
                        'data' => $data,
                    ]
                );      
                echo view('template/footertemplate');    
    }
} 

    

  

