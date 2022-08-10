

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
      <a href="<?=base_url('penggajian/add')?>" class="btn btn-primary costum-btn-sm">Tambah Transaksi penggajian</a>
            <table class="table table-bordered table-hover" id="myTable">
                  <thead>
                  <tr>
                    <th>Id gaji</th>
                    <th>Nama Pegawai</th>
                    <th>Jumlah</th>                 

                    <th>Tanggal penggajian</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  foreach($data_penggajian as $row): ?>
                  <tr>
                    <td><?= $row->id_gaji ?></td>
                    <td><?= $row->nama_pegawai ?></td>
                    <td><?php echo format_rupiah($row->jumlah);  ?></td>
                    <td><?= $row->tgl_penggajian ?></td> 
                    
                                      
        
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