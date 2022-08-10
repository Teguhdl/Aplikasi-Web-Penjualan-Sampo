

<!-- Tambahan Alert Jika Sukses DML -->
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
<!-- Akhir Alert Jika Sukses DML -->
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
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header"> 
      <div class="card-body">
      <a href="<?=base_url('penjualan/add')?>" class="btn btn-primary costum-btn-sm">Tambah Transaksi Penjualan</a>
            <table class="table table-bordered table-hover" id="myTable">
                  <thead>
                  <tr>
                    <th>Id Jual</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Produk</th>
                    
                    <th>Ukuran</th>                 
                    <th>qty</th>
                    <th>Harga Penjualan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  foreach($data_penjualan as $row): ?>
                  <tr>
                    <td><?= $row->id_jual ?></td>
                    <td><?= $row->nama_pelanggan ?></td>
                    <td><?= $row->nama_produk ?></td>
                    <td><?= $row->ukuran ?></td> 
                    
                                      
                    <td><?= $row->qty ?></td>
                    <td  style="text-align:right" > <?php  echo format_rupiah($row->harga_jual) ;  ?></td>
                  </tr>
                  <?php endforeach; ?>
                  </tfoot>
                  </tbody>
                </table>
               
      </div>
      </div>
            </div>
          </div>
      


<!-- Akhir section konten -->    