<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <!-- Tambahan Sweet Alert -->
          <?php 
            // jika session status_dml ada isinya maka tampilkan alert menggunakan sweet alert
            if(session()->has("pesan")){
              ?>
                  <script>
                      Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: '<?=session("pesan");?>'
                      });
                  </script>
              <?php
            }
          ?>
     <div class="main-content">
        <section class="section">
          <div class="section-header">
          <h1 class="h2"><?= esc($title) ?></h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?=base_url('menu/view')?>">Master Data</a></div>
              <div class="breadcrumb-item"><a href="<?=base_url('penjualan/view')?>">Transaksi</a></div>
            </div>
          </div>
      <canvas class="my-4 w-100" id="myChart" width="900" height="300" hidden></canvas>

      <div class="row">
                <div class="mb-3">
                    
                    <!-- Box Akurasi -->
                    <div class="alert alert-success" role="alert">
                        <h5 class="alert-heading">Akurasi Model Pada Data Testing</h5>
                        <hr>
                        Hasil Akurasi MSE = <?=$Akurasi_MSE?> <br>
                        Hasil Akurasi MAE = <?=$Akurasi_MAE?>
                    </div>
                    <!-- Akhir Box Akurasi -->
                    <div id="canvas-holder" style="width:100%">
                        <canvas id="chart-area" width="1000" height="500" />
                    </div>
                </div>    
                
        </div>
      
    


        <!-- Script konfigurasi chart -->
        <script>

          var config = {
                  type: 'line',
                  data: {
                      datasets: [
                          {
                              label: 'Aktual',
                              data: <?php echo json_encode($harga_jual);?>,
                              fill:"false",
                              "borderColor":"rgb(75, 192, 192)",
                              "lineTension":0
                          },
                          {
                              label: 'Prediksi',
                              data: <?php echo json_encode($PrediksiPenjualan);?>,
                              fill:"false",
                              "borderColor": "rgb(255, 0, 0)",
                              "lineTension":0
                          }
                      ],
                      labels: <?php echo json_encode($id_sampo);?>
                  },
                  options: {
                      responsive: true,
                      title: {
                  display: true,
                  text: 'Grafik Proyeksi Penjualan Berdasarkan Penjualan Kopinus'
                }
                  }
              };

              window.onload = function() {
                  var ctx = document.getElementById("chart-area").getContext("2d");
                  window.myLine  = new Chart(ctx, config);
              };
    </script> 
      </div>
    </section>
</div>

                   

    <!-- Akhir Grafik batang -->


<!-- Akhir section konten -->    