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
      
      <br>
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
                                     <p class="card-text"><b>Ukuran 250 - 750 ml</b></p> 
                                    <a href="<?=base_url('sampo/viewByIdproduk/'.$row['id_produk'])?>" class="btn btn-primary custom-btn">Lihat Detail</a>
                                    <a href="<?=base_url('menu/viewdata/'.$row['id_produk'])?>" class="btn btn-warning">Ubah</a>
                                    <a onclick="deleteConfirm('<?php echo base_url('menu/delete/'.$row['id_produk']) ?>')" href="#" class="btn btn-danger" role="button" aria-pressed="true">Hapus</a>
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
                                    <p class="card-text"><b>Ukuran 250 - 750 ml</b></p> 
                                    <a href="<?=base_url('sampo/viewByIdproduk/'.$row['id_produk'])?>" class="btn btn-primary custom-btn">Lihat Detail</a>
                                    <a href="<?=base_url('menu/viewdata/'.$row['id_produk'])?>" class="btn btn-warning">Ubah</a>
                                    <a onclick="deleteConfirm('<?php echo base_url('menu/delete/'.$row['id_produk']) ?>')" href="#" class="btn btn-danger" role="button" aria-pressed="true">Hapus</a>
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
            </div>
        <p>    
        <a href="<?=base_url('menu/view2')?>" class="btn btn-info btn-sm">Lihat Data Dalam List</a>
        <div class="row">
            <div class="col-sm-5"></div>
            <div class="col-sm-2">
                <a href="<?= base_url('menu/add') ?>" class="btn btn-success" id="tmbh">Tambah Data Shampoo</a>
            </div>
            <div class="col-sm-5"></div>
        </div>      
      <!-- Akhir tambahan untuk card -->

  
  </div>
</div>


    <!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->

    <!-- Modal Delete -->
    <script>
          function deleteConfirm(url){
              var tomboldelete = document.getElementById('btn-delete')  
              tomboldelete.setAttribute("href", url); //akan meload kontroller delete

              var pesan = "Data dengan ID <b>"
              var pesan2 = " </b>akan dihapus"
              var n = url.lastIndexOf("/")
              var res = url.substring(n+1);
              document.getElementById("xid").innerHTML = pesan.concat(res,pesan2);

              var myModal = new bootstrap.Modal(document.getElementById('deleteModal'), {  keyboard: false });
              
              myModal.show();
            
          }
      </script>
      <!-- Logout Delete Confirmation-->
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
              <a id="btn-tutup" class="btn btn-secondary" data-bs-dismiss="modal">X</a>
            </div>
            <div class="modal-body" id="xid"></div>
            <div class="modal-footer">
              <a id="btn-batal" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</a>
              <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
            </div>
          </div>
        </div>
      </div>   
     
    <!-- Akhir Modal Delete -->
      