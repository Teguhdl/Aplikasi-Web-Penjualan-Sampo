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

      <!-- Tambahan untuk card -->

    <p align="left">
        <!-- <button href="#" class="btn btn-primary btn-sm tomboltambah">Tambah</button> -->
        <a href="#" class="btn btn-primary costum-btn-sm tampilmodaltambah" data-toogle="modal" data-target="#ubahModal"><span data-feather="chevrons-up"></span> Setor</a>
            
    </p>

    <div class="row">
            <div class="col">
            <div class="card">
                <div class="card-header">
                    Tabel Pemodalan
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

   
    <!-- Ubah dan tambah Modal -->
    <div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="labelmodalubah">Ubah Data Pemodalan</h5>
                <a id="btn-tutup" class="btn btn-secondary" data-bs-dismiss="modal">X</a>
                </div>
                
                <div class="modal-body">
                  <!-- Form untuk input -->
                  <form action="<?=base_url('pemodalan/update')?>" class="formubahpemodalan" method="post">
                      <input type="hidden" id="idpemodalan" name="idpemodalan" value="">
                      
                      <div class="mb-3 row">
                          <label for="menulabel" class="col-sm-2 col-form-label">Menu</label>
                          <div class="col-sm-10">
                              <select class="form-select" aria-label="Default select example" name="idmenu" id="idmenu">
                                  <?php
                                      foreach($datamenu as $row):
                                      ?>
                                          <option value="<?=$row['id_produk']?>"><?=$row['nama_produk']?></option>
                                      <?php
                                      endforeach;
                                  ?>
                              </select>
                              <div class="invalid-feedback erroridmenu"></div>
                          </div>
                      </div>

                      <div class="mb-3 row">
                        <label for="modallabel" class="col-sm-2 col-form-label">Modal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="besarmodal" name="besarmodal" placeholder="Masukkan Besar Modal">
                            <div class="invalid-feedback errorbesarmodal"></div>
                        </div>
                      </div>         
                      
                      <div class="mb-3 row">
                        <label for="keteranganlabel" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan">
                            <div class="invalid-feedback errorketerangan"></div>
                        </div>
                      </div>    

                      <div class="mb-3 row">
                        <label for="tanggallabel" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                            <div class="invalid-feedback errortanggal"></div>
                        </div>
                      </div>  

                      <div class="mb-3 row">
                        <label for="tanggallabel" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <div id="xstatus"></div>
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
        <!-- Akhir MUbah Modal -->          
    
        <!-- Modal Setor -->
        <script>
          $(function() {
            $('.tampilmodaltambah').on('click', function(){
              // console.log('ij');
              $('#labelmodalubah').html('Setor Modal');
              $('.formubahpemodalan').attr('action','<?=base_url('pemodalan/add')?>');
                  

              // kosongkan isi dari input form
              $('#besarmodal').val('');
              $('#keterangan').val('');
              $('#tanggal').val('');

              $('#ubahModal').modal('show');

              $.ajax({
                  
                url: $(this).attr('action'), 
                data: $(this).serialize(),
                method: 'post',
                dataType: 'json',
                success: function(response){
                  //
                      if(response.error){
                            if(response.error.idmenu){
                                    $('#idmenu').addClass('is-invalid');
                                    $('.erroridmenu').html(response.error.idmenu);
                                }else{
                                    $('#idmenu').removeClass('is-invalid');
                                    $('.erroridmenu').html();
                                }
                                if(response.error.besarmodal){
                                    $('#besarmodal').addClass('is-invalid');
                                    $('.errorbesarmodal').html(response.error.besarmodal);
                                }else{
                                    $('#besarmodal').removeClass('is-invalid');
                                    $('.errorbesarmodal').html();
                                }
                                if(response.error.keterangan){
                                    $('#keterangan').addClass('is-invalid');
                                    $('.errorketerangan').html(response.error.keterangan);
                                }else{
                                    $('#keterangan').removeClass('is-invalid');
                                    $('.errorketerangan').html();
                                }
                                if(response.error.tanggal){
                                    $('#tanggal').addClass('is-invalid');
                                    $('.errortanggal').html(response.error.tanggal);
                                }else{
                                    $('#tanggal').removeClass('is-invalid');
                                    $('.errortanggal').html();
                                }
                        }else{
                                // muncul pesan sukses
                                alert(response.sukses);
                                // tutup modal
                                $('#ubahModal').modal('hide');
                                datapemodalan(); //refresh data penghuni otomatis
                                // tampilkan alert pesan

                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: response.sukses,
                                    icon: 'success',
                                    confirmButtonText: 'Ok'
                                })

                        }
                  //
                }
              });

            });
          });
        </script>
        <!-- Akhir Modal Tambah Pop Up versi 2 -->

        <!-- Modal Tarik -->
        <script>
          $(function() {
            $('.tampilmodaltarik').on('click', function(){
              // console.log('ij');
              $('#labelmodalubah').html('Tarik Modal');
              $('.formubahpemodalan').attr('action','<?=base_url('pemodalan/tarik')?>');
                  

              // kosongkan isi dari input form
              $('#besarmodal').val('');
              $('#keterangan').val('');
              $('#tanggal').val('');

              $('#ubahModal').modal('show');

              $.ajax({
                  
                url: $(this).attr('action'), 
                data: $(this).serialize(),
                method: 'post',
                dataType: 'json',
                success: function(response){
                  //
                      if(response.error){
                            if(response.error.idmenu){
                                    $('#idmenu').addClass('is-invalid');
                                    $('.erroridmenu').html(response.error.idmenu);
                                }else{
                                    $('#idmenu').removeClass('is-invalid');
                                    $('.erroridmenu').html();
                                }
                                if(response.error.besarmodal){
                                    $('#besarmodal').addClass('is-invalid');
                                    $('.errorbesarmodal').html(response.error.besarmodal);
                                }else{
                                    $('#besarmodal').removeClass('is-invalid');
                                    $('.errorbesarmodal').html();
                                }
                                if(response.error.keterangan){
                                    $('#keterangan').addClass('is-invalid');
                                    $('.errorketerangan').html(response.error.keterangan);
                                }else{
                                    $('#keterangan').removeClass('is-invalid');
                                    $('.errorketerangan').html();
                                }
                                if(response.error.tanggal){
                                    $('#tanggal').addClass('is-invalid');
                                    $('.errortanggal').html(response.error.tanggal);
                                }else{
                                    $('#tanggal').removeClass('is-invalid');
                                    $('.errortanggal').html();
                                }
                                if(response.error.status_penarikan){
                                    $('#xstatus').html('<p class="text-danger"><b>'+response.error.status_penarikan+'</b></p>');
                                }else{
                                    $('#xstatus').html();
                                }
                        }else{
                                // muncul pesan sukses
                                alert(response.sukses);
                                // tutup modal
                                $('#ubahModal').modal('hide');
                                datapemodalan(); //refresh data penghuni otomatis
                                // tampilkan alert pesan

                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: response.sukses,
                                    icon: 'success',
                                    confirmButtonText: 'Ok'
                                })

                        }
                  //
                }
              });

            });
          });
        </script>
        <!-- Akhir Modal Tambah Pop Up versi 2 -->

        <!-- Modal Untuk Tambah Pop Up -->
        <script>
            function datapemodalan(){
                $.ajax(
                        {
                            url: "<?=base_url('pemodalan/ambildata')?>",
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
              datapemodalan();
                }
            );
        </script>
        <!-- Akhir Modal Untuk Tambah Pop Up --> 


<?= $this->endSection('konten');  ?>
<!-- Akhir section konten -->    