<div class="main-content">
        <section class="section">
          <div class="section-header">
          <h1 class="h2"><?= esc($title) ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?=base_url('menu/view')?>">Master Data</a></div>
            </div>
          </div>

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
      <!-- Tambahan untuk table -->
      

      <!-- Tambahan untuk Input Pakai Pop Up -->
     
      <!-- Akhir input pakai Pop Up -->

      <!-- Untuk tempat modal input pop up -->

      <!-- Akhir tempat modal input pop up -->
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                <a href="<?=base_url('menu/add')?>" class="btn btn-success btn-sm">Tambah Data menu</a>
                </div>
              </div>
              <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="myTable">
            <thead>
              <tr>
                <th scope="col">Id Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                  // looping hasil menu dari database
                  foreach($datamenu as $row):
                      ?>
                          <tr>
                            <th scope="row"><?=$row['id_produk']?></th>
                            <td><?=$row['nama_produk']?></td>
                            
                            <td>
                               <a href="<?=base_url('sampo/viewByIdproduk/'.$row['id_produk'])?>" class="btn btn-primary btn-sm">Lihat Detail</a>
                               <a href="<?=base_url('menu/viewData/'.$row['id_produk'])?>" class="btn btn-warning btn-sm">Ubah</a>
                               <a onclick="deleteConfirm('<?php echo base_url('menu/delete/'.$row['id_produk']) ?>')" href="#" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Hapus</a>
                               
                            </td>
                          </tr>
                      <?php
                  endforeach;
              ?>
                     </tfoot>
                   </tbody>
                </table>
      <!-- Akhir tambahan table-->
                    </div>
              </div>
            </div>
            </div>
          </div>
    
            
  </div>



    <!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->

    <!-- Script untuk mengaktifkan tabel menjadi data tables -->
   
    <!-- Akhir script untuk mengakfitkan tabel menjadi data tables -->

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


    <!-- Modal Untuk Tambah Pop Up -->
   
    <!-- Akhir Modal Untuk Tambah Pop Up -->