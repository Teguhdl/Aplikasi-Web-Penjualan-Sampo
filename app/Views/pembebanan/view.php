<!-- Tambahan Extend Layout -->
<?= $this->extend('Templates/all');  ?>
<!-- Akhir Tambahan Extend Layout -->

<!-- Awal section konten -->
<?= $this->Section('konten');  ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= esc($title) ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380" hidden></canvas>

      
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
        <a href="#" class="btn btn-primary btn-sm tampilbebantambah" data-toogle="beban" data-target="#ubahBeban"><span data-feather="chevrons-up"></span> Setor</a>
        <a href="#" class="btn btn-success btn-sm tampilbebantarik" data-toogle="beban" data-target="#ubahBeban"><span data-feather="chevrons-down"></span> Tarik</a>
            
    </p>

    <div class="row">
            <div class="col">
            <div class="card">
                <div class="card-header">
                    Tabel Pembebanan
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

              var myBeban = new bootstrap.Beban(document.getElementById('deleteBeban'), {  keyboard: false });
              
              myBeban.show();

          }

          
      </script>
      <!-- Logout Delete Confirmation-->
      <div class="beban fade" id="deleteBeban" tabindex="-1" role="dialog" aria-labelledby="exampleBebanLabel" aria-hidden="true">
        <div class="beban-dialog" role="document">
          <div class="beban-content">
            <div class="beban-header">
              <h5 class="beban-title" id="exampleBebanLabel">Apakah anda yakin?</h5>
              <a id="btn-tutup" class="btn btn-secondary" data-bs-dismiss="beban">X</a>
            </div>
            <div class="beban-body" id="xid"></div>
            <div class="beban-footer">
              <a id="btn-batal" class="btn btn-secondary" data-bs-dismiss="beban">Batalkan</a>
              <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
            </div>
          </div>
        </div>
      </div>   
    <!-- Akhir Beban Delete -->

   
    <!-- Ubah dan tambah Beban -->
    <div class="beban fade" id="ubahBeban" tabindex="-1" role="dialog" aria-labelledby="exampleBebanLabel" aria-hidden="true">
            <div class="beban-dialog" role="document">
            <div class="beban-content">
                <div class="beban-header">
                <h5 class="beban-title" id="labelbebanubah">Ubah Data Pembebanan</h5>
                <a id="btn-tutup" class="btn btn-secondary" data-bs-dismiss="beban">X</a>
                </div>
                
                <div class="beban-body">
                  <!-- Form untuk input -->
                  <form action="<?=base_url('pembebanan/update')?>" class="formubahpembebanan" method="post">
                      <input type="hidden" id="idpembebanan" name="idpembebanan" value="">
                      
                      <div class="mb-3 row">
                          <label for="kopinuslabel" class="col-sm-2 col-form-label">Kopinus</label>
                          <div class="col-sm-10">
                              <select class="form-select" aria-label="Default select example" name="idkopinus" id="idkopinus">
                                  <?php
                                      foreach($datakopinus as $row):
                                      ?>
                                          <option value="<?=$row['id_kopinus']?>"><?=$row['nama']?></option>
                                      <?php
                                      endforeach;
                                  ?>
                              </select>
                              <div class="invalid-feedback erroridkopinus"></div>
                          </div>
                      </div>

                      <div class="mb-3 row">
                        <label for="bebanlabel" class="col-sm-2 col-form-label">Beban</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="besarbeban" name="besarbeban" placeholder="Masukkan Besar Beban">
                            <div class="invalid-feedback errorbesarbeban"></div>
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

                <div class="beban-footer">
                    <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                </div>
            </div>
            </div>
        </div>   
        <!-- Akhir MUbah Beban -->          
    
        <!-- Beban Setor -->
        <script>
          $(function() {
            $('.tampilbebantambah').on('click', function(){
              // console.log('ij');
              $('#labelbebanubah').html('Setor Beban');
              $('.formubahpembebanan').attr('action','<?=base_url('pembebanan/add')?>');
                  

              // kosongkan isi dari input form
              $('#besarbeban').val('');
              $('#keterangan').val('');
              $('#tanggal').val('');

              $('#ubahbeban').beban('show');

              $.ajax({
                  
                url: $(this).attr('action'), 
                data: $(this).serialize(),
                method: 'post',
                dataType: 'json',
                success: function(response){
                  //
                      if(response.error){
                            if(response.error.idproduk){
                                    $('#idkopinus').addClass('is-invalid');
                                    $('.erroridkopinus').html(response.error.idproduk);
                                }else{
                                    $('#idproduk').removeClass('is-invalid');
                                    $('.erroridproduk').html();
                                }
                                if(response.error.besarmodal){
                                    $('#besarbeban').addClass('is-invalid');
                                    $('.errorbesarbeban').html(response.error.besarbeban);
                                }else{
                                    $('#besarbebas').removeClass('is-invalid');
                                    $('.errorbesarbeban').html();
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
                                // tutup beban
                                $('#ubahBeban').beban('hide');
                                datapembebanan(); //refresh data penghuni otomatis
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
        <!-- Akhir Beban Tambah Pop Up versi 2 -->

        <!-- Beban Tarik -->
        <script>
          $(function() {
            $('.tampilmodaltarik').on('click', function(){
              // console.log('ij');
              $('#labelbebanubah').html('Tarik Beban');
              $('.formubahpemmbeban').attr('action','<?=base_url('pembebanan/tarik')?>');
                  

              // kosongkan isi dari input form
              $('#besarbebas').val('');
              $('#keterangan').val('');
              $('#tanggal').val('');

              $('#ubahBeban').beban('show');

              $.ajax({
                  
                url: $(this).attr('action'), 
                data: $(this).serialize(),
                method: 'post',
                dataType: 'json',
                success: function(response){
                  //
                      if(response.error){
                            if(response.error.idkopinus){
                                    $('#idproduk').addClass('is-invalid');
                                    $('.erroridproduk').html(response.error.idkopinus);
                                }else{
                                    $('#idproduk').removeClass('is-invalid');
                                    $('.erroridproduk').html();
                                }
                                if(response.error.besarbeban){
                                    $('#besarbeban').addClass('is-invalid');
                                    $('.errorbesarbeban').html(response.error.besarbeban);
                                }else{
                                    $('#besarbeban').removeClass('is-invalid');
                                    $('.errorbesarbeban').html();
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
                                // tutup beban
                                $('#ubahBeban').beban('hide');
                                datapembebanan(); //refresh data penghuni otomatis
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
        <!-- Akhir Beban Tambah Pop Up versi 2 -->

        <!-- Beban Untuk Tambah Pop Up -->
        <script>
            function datapembebanan(){
                $.ajax(
                        {
                            url: "<?=base_url('pembebanan/ambildata')?>",
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
              datapembebanan();
                }
            );
        </script>
        <!-- Akhir Beban Untuk Tambah Pop Up --> 


<?= $this->endSection('konten');  ?>
<!-- Akhir section konten -->    