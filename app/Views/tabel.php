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

      <canvas class="my-4 w-100" id="myChart" width="900" height="380" hidden></canvas>

      
      <div class="alert alert-success" role="alert">
          <?php 
            $session = session();
            echo "Selamat datang ".$session->get('user_name');
          ?>
      </div>


      <br>
      <div class="table-responsive">
      <table id="example" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>#No</th>
              <th>Aktual</th>
              <th>Prediksi</th>
            </tr>
          </thead>
          <tbody>
                <?php
                    $j = 1;
                    for($i=0;$i<count($Id_penjualan);$i++){
                        ?>
                            <tr>
                                <td><?= $j;?></td>
                                <td><?= $harga_jual[$i];?></td>
                                <td><?= $PrediksiPenjualan[$i];?></td>
                            </tr>
                        <?php
                        $j++;
                      }  
                ?>
          </tbody>
        </table>
      </div>

      <script>
            $(document).ready(function() {
                $('#example').DataTable(
                  {
                    //untuk memodifikasi list filter baris yang ditampilkan
                    "lengthMenu": [ 10, 20, 50, 100, 1000]
                  }  
                );
            } );
    </script>
      </div>
    </section>
</div>

