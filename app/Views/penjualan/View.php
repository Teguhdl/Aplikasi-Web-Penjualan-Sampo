<!-- Tambahan Extend Layout -->
<?= $this->extend('template/all');  ?>
<!-- Akhir Tambahan Extend Layout -->

<!-- Awal section konten -->
<?= $this->Section('konten');  ?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
          <h1 class="h2"><?= esc($title) ?></h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?=base_url('menu/view')?>">Master Data</a></div>
              <div class="breadcrumb-item"><a href="<?=base_url('penjualan/view')?>">Transaksi</a></div>
            </div>
          </div>
    
      <div class="alert alert-success" role="alert">
          <?php 
            $session = session();
            echo "Selamat datang ".$session->get('user_name');
          ?>
      </div>

      <!-- Tambahan Sweet Alert -->
      <?php 
        // jika session status_dml ada isinya maka tampilkan alert menggunakan sweet alert
        if(session()->has("status_dml")){
          ?>
              <script>
                  Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '<?=session("status_dml");?>'
                  });
              </script>
          <?php
        }
      ?>
      
      <!-- Akhir Tambahan Sweet Alert -->

      <!-- Tambahan Alert Jika Sukses DML -->
          <?php
              if(session()->has("status_dml")){
                ?>
                <div class="row">
                  <div class="col">
                    <div class="alert alert-primary" role="alert">
                      <b><?=session("status_dml");?></b>
                    </div>
                  </div>  
                </div>  
                <?php
              }
          ?>
      <!-- Akhir Alert Jika Sukses DML -->

      <!-- Tambahan untuk card -->
      <div class="row">
        <?php 
            $i = 1;
            foreach($datamenu as $row):
                if(fmod($i,3)==0){
                    ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row['nama_produk'];?></h5>
                                    <p class="card-text"><b>Ukuran Tersedia : 250 - 750 ml</b></p> 
                                    <a href="<?=base_url('penjualan/add/')?>" class="btn btn-primary custom-btn">Pesan Sekarang  </a>
                                    
                                    
                                </div>
                            </div>
                        </div>
                      </div>
                     <br> 
                    <div class="row">
                    <?php
                }else{
                    ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $row['nama_produk'];?></h4>
                                    <p class="card-text"><b>Ukuran Tersedia : 250 - 750 ml</b></p> 
                                    <a href="<?=base_url('penjualan/add/')?>" class="btn btn-primary custom-btn">Pesan Sekarang  </a>
                            
                                    
                                </div>
                            </div>
                        </div>
                    <?php
                }    
                ?>
                <?php
                $i = $i + 1;
            endforeach;
        ?>    
        <a href="<?=base_url('penjualan/viewpenjualan')?>" class="btn btn-warning costum-btn-sm">Lihat Data Penjualan</a>
            </div>

<!-- Akhir section konten -->    

<?= $this->endSection('konten');  ?>
<!-- Akhir section konten -->    