<?php

namespace App\Controllers;

// load algoritma least squares pada regression
use Phpml\Regression\LeastSquares;
use Phpml\Metric\Regression; //untuk metric regresi
use Phpml\Dataset\ArrayDataset; //untuk dataset array
use Phpml\CrossValidation\StratifiedRandomSplit; //untuk cross validation
use Phpml\CrossValidation\RandomSplit; //untuk cross validation
use App\Models\ModelMachineLearning;

class MachineLearning extends BaseController
{
    public function getProyeksiPenjualan(){
        //query data iklan
        $ModelMachineLearning = model(ModelMachineLearning::class);
        $hasil = $ModelMachineLearning->getAll();
        $X = []; // atribut input
        $y = []; // atribut target
        foreach($hasil as $row):
            array_push($X, array($row['qty'])); //masukkan data tv,radio, newspaper ke var X
            array_push($y, $row['harga_jual']); //masukkan data sales sebagai data target
        endforeach;
        
        // membuat data set group
        $dataset = new ArrayDataset(
            $samples = $X,
            $targets = $y
        );
        
        // membuat random split data 30% testing, 70% training
        $dataset = new RandomSplit($dataset, 0.3, 1234);
        // train group
        $X_train = $dataset->getTrainSamples();
        $y_train = $dataset->getTrainLabels();

        // test group
        $X_test = $dataset->getTestSamples();
        $y_test = $dataset->getTestLabels();

        $regression = new LeastSquares();
		$regression->train($X_train, $y_train); // melatih data training

        $y_test_prediction = $regression->predict($X_test); // memprediksi data testing
        $y_prediction = $regression->predict($X); // memprediksi seluruh data

        // dapatkan data anggaran untuk TV dari seluruh data dengan qty sales
        $dtTVaktual = []; $dtSalesaktual = []; 
        foreach($hasil as $row):
            array_push($dtTVaktual,$row['qty']); // mengambil nilai tv
            array_push($dtSalesaktual,$row['harga_jual']); // mengambil aktual sales
        endforeach;

        $data['id_sampo'] = $dtTVaktual;
        $data['harga_jual'] = $dtSalesaktual;
        $data['PrediksiPenjualan'] = $y_prediction;
        
        // menghitung akurasi MAE
        $data['Akurasi_MSE'] = Regression::meanSquaredError($y_test, $y_test_prediction);
		$data['Akurasi_MAE'] = Regression::meanAbsoluteError($y_test, $y_test_prediction);
        $data['title'] = 'Proyeksi Penjualan Kopinus';
        
        echo view('template/headertemplate');
        echo view('template/sidebartemplate');
        echo view('grafik', $data);
        echo view('template/footertemplate');
       
        
        /*
        echo "<pre>";
        print_r($data['PrediksiSales']);
        echo "</pre>";
        */
        //return view('Modul12/regresi', $data);

    }

    public function getTabelProyeksiPenjualan(){
        //query data iklan
        $ModelMachineLearning = model(ModelMachineLearning::class);
        $hasil = $ModelMachineLearning->getAll();
        $X = []; // atribut input
        $y = []; // atribut target
        foreach($hasil as $row):
            array_push($X, array($row['qty'])); //masukkan data tv,radio, newspaper ke var X
            array_push($y, $row['harga_jual']); //masukkan data sales sebagai data target
        endforeach;
        
        // membuat data set group
        $dataset = new ArrayDataset(
            $samples = $X,
            $targets = $y
        );
        
        // membuat random split data 30% testing, 70% training
        $dataset = new RandomSplit($dataset, 0.3, 1234);
        // train group
        $X_train = $dataset->getTrainSamples();
        $y_train = $dataset->getTrainLabels();

        // test group
        $X_test = $dataset->getTestSamples();
        $y_test = $dataset->getTestLabels();

        $regression = new LeastSquares();
		$regression->train($X_train, $y_train); // melatih data training

        $y_test_prediction = $regression->predict($X_test); // memprediksi data testing
        $y_prediction = $regression->predict($X); // memprediksi seluruh data

        // dapatkan data anggaran untuk TV dari seluruh data dengan qty sales
        $dtTVaktual = []; $dtSalesaktual = []; 
        $dtId = [];
        foreach($hasil as $row):
            array_push($dtTVaktual,array($row['qty'])); // mengambil nilai tv
            array_push($dtSalesaktual,$row['harga_jual']); // mengambil aktual sales
        endforeach;

        
        
        $data['Id_penjualan'] = $dtTVaktual;
        $data['harga_jual'] = $dtSalesaktual;
        $data['PrediksiPenjualan'] = $y_prediction;
        
        // menghitung akurasi MAE
        $data['Akurasi_MSE'] = Regression::meanSquaredError($y_test, $y_test_prediction);
		$data['Akurasi_MAE'] = Regression::meanAbsoluteError($y_test, $y_test_prediction);
        $data['title'] = 'Proyeksi Penjualan Kopinus';
        
          
        echo view('template/headertemplate');
        echo view('template/sidebartemplate');
        echo view('tabel', $data);
        echo view('template/footertemplate');
    

    }


}
