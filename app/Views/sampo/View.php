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
              <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?=base_url('menu/view')?>">Master Data</a></div>
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

      <!-- Tambahan untuk card -->

    <p align="right">
        <!-- <button href="#" class="btn btn-primary btn-sm tomboltambah">Tambah</button> -->
        <a href="#" class="btn btn-primary btn-sm tampilmodaltambah" data-toogle="modal" data-target="#ubahModal">Tambah</a>
    </p>

    <!-- Untuk tempat modal input pop up -->
    <div class="viewmodal" style="display:none;"></div>
    <!-- Akhir tempat modal input pop up -->
    <div class="row">
            <div class="col">
            <div class="card">
                <div class="card-header">
                    Tabel sampo
                </div>
                <div class="card-body">
                    <p class="viewdata"></p>  
                </div>
            </div>
            </div>
    </div>        
    
    <!-- Akhir tambahan table-->
      
      <!-- Akhir tambahan untuk card -->

    </main>
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

    <!-- Ubah dan tambah Modal  -->
    <div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="labelmodalubah">Ubah Data sampo <?=$namamenu ?></h5>
              <a id="btn-tutup" class="btn btn-secondary" data-bs-dismiss="modal">X</a>
            </div>
            
            <div class="modal-body"> 
              <form action="<?=base_url('sampo/update')?>" class="formubahsampo" method="post">
                   <input type="hidden" id="idsampohidden" name="idsampohidden" value="">
                   <input type="hidden" id="idmenuhidden" name="idmenuhidden" value="">
                  <div class="mb-3 row">
                      <label for="ukuranlabel" class="col-sm-2 col-form-label">ukuran</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="ukuran" name="ukuran" placeholder="Masukkan ukuran sampo, cth: A-101">
                          <div class="invalid-feedback errorukuran"></div>
                      </div>
                  </div>
                  
                  <div class="mb-3 row">
                      <label for="hargalabel" class="col-sm-2 col-form-label">Harga</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga, cth: 100.000.000">
                          <div class="invalid-feedback errorharga"></div>
                      </div>
                  </div>
                
              <div class="mb-3 row">
                      <label for="stoklabel" class="col-sm-2 col-form-label">stok</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan stok, cth: 100.000.000">
                          <div class="invalid-feedback errorstok"></div>
                      </div>
                  </div>
              </div>  
        

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
              </div>
          </div>
        </div>
      </div>   
    
     <!-- Akhir MUbah Modal --> -->

    <!-- Modal Tambah Pop Up versi 2 -->
    <script>
      $(function(){
            $('.tampilmodaltambah').on('click', function(){
              // merubah label menjadi Tambah Data sampo
              $('#labelmodalubah').html('Tambah Data sampo <?=$namamenu?>');
              $('.formubahsampo').attr('action','<?=base_url('sampo/add')?>');
              $('#idmenuhidden').val(<?=$idmenu?>);

              // kosongkan isi dari input form
              $('#ukuran').val('');
              $('#harga').val('');
              $('#stok').val('');
              $('#idsampohidden').val('');

              $('#ubahModal').modal('show');
              
              const id = $(this).data('id');
              $.ajax(
                {
                  url: $(this).attr('action'), 
                  data: $(this).serialize(),
                  method: 'post',
                  dataType: 'json',
                  success: function(response){
                    
                  // jika responsenya adalah error
                  if(response.error){
                      if(response.error.ukuran){
                              $('#ukuran').addClass('is-invalid');
                              $('.errorukuran').html(response.error.ukuran);
                          }else{
                              $('#ukuran').removeClass('is-invalid');
                              $('.errorukuran').html();
                          
                          
                          }
                          if(response.error.harga){
                              $('#harga').addClass('is-invalid');
                              $('.errorharga').html(response.error.harga);
                          }else{
                              $('#harga').removeClass('is-invalid');
                              $('.errorharga').html();
                          }
                          if(response.error.stok){
                              $('#stok').addClass('is-invalid');
                              $('.errorstok').html(response.error.stok);
                          }else{
                              $('#stok').removeClass('is-invalid');
                              $('.errorstok').html();
                          }
                      }else{
                          // muncul pesan sukses
                          // alert(response.sukses);
                          // tutup modal
                          $('#ubahModal').modal('hide');
                          datasampo(); //refresh data penghuni otomatis
                          // tampilkan alert pesan

                          Swal.fire({
                              title: 'Berhasil!',
                              text: response.sukses,
                              icon: 'success',
                              confirmButtonText: 'Ok'
                          })

                      }
                    // console.log(data[0].ukuran);
                  }
                }
              );
            });
          }); 
    </script>
    <!-- Akhir Modal Tambah Pop Up versi 2 -->

    <!-- Modal Untuk Tambah Pop Up -->
    <script>
        function datasampo(){
            $.ajax(
                    {
                        url: "<?=base_url('sampo/ambildata/'.$idproduk)?>",
                        dataType: "json",
                        success: function(response){
                            $('.viewdata').html(response.data);
                        },
                        error: function(xhr, ajaxOptions, thrownError){
                                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                                } 
                    }
            )
        }
        
    </script>
    <script>
        $(document).ready(function(){
            datasampo();
            }
        );
    </script>
    <!-- Akhir Modal Untuk Tambah Pop Up -->

    

<?= $this->endSection('konten');  ?>
<!-- Akhir section konten -->    