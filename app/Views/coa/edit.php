<div class="main-content">
        <section class="section">
          <div class="section-header">
          <h1 class="h2"><?= esc($title) ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?=base_url('coa/view')?>">Master Data</a></div>
            </div>
          </div>

      <!-- Main content -->
    <section class="content">
      <div class="container-flukode">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form <?= esc($title)?></h3>
              </div>
              <!-- /.card-header -->
              <!-- Looping data kosan -->
                <?php 
                    foreach ($datacoa as $row) {
                        $kode_coa = $row->kode_coa;
                        $nama_coa = $row->nama_coa; 
                        $header_akun = $row->header_akun; 
  

                    }
                ?>
              <!-- form start -->
              <form action="<?=base_url('coa/update')?>" method="post">
              <?= csrf_field() ?>
                <div class="card-body">
                <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">kode coa</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" kode="kode_coa" name="kode_coa" value="<?=$kode_coa?>" readonly>                         
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama coa</label>
                    <div class="col-sm-10">
                        <?php
                            //jika set value namakosan tkodeak kosong maka isi $nama diganti dengan isian dari user
                            if(strlen(set_value('nama_coa'))>0){
                            $nama_coa = set_value('nama_coa');
                            }
                        ?>
                      <input type="text" class="form-control" kode="nama_coa" placeholder="Nama" name="nama_coa" value="<?=$nama_coa?>">
                      <div class="invalkode-feedback" kode="errornama_coa"></div>
                        <?php 
                        // contoh mendapatkan error per komponen
                        if(isset($validation)){
                            if($validation->getError('nama_coa')) {?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-invalkode
                                    document.getElementBykode('nama_coa').setAttribute("class", "form-control is-invalkode");
                                    document.getElementBykode('errornama_coa').innerHTML = "<?=$validation->getError('nama_coa'); ?>";
                                    // serta tambahkan div class invalkode
                                </script>
                            <?php 
                            }else{
                                // tkodeak ada error di nama_kos maka nilai is-invalkode dihapuskan
                                ?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-valkode
                                    document.getElementBykode('nama_coa').setAttribute("class", "form-control is-valkode");
                                    document.getElementBykode('errornama_coa').innerHTML = "";
                                    // serta tambahkan div class is valkode
                                </script>
                                <?php
                            }
                        }?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Header Akun</label>
                     <div class="col-sm-10">
                        <?php
                            //jika set value namakosan tkodeak kosong maka isi $nama diganti dengan isian dari user
                            if(strlen(set_value('header_akun'))>0){
                            $header_akun = set_value('header_akun');
                            }
                        ?>
                        <input type="text" class="form-control" kode="header_akun" name="header_akun" placeholder="header_akun" value="<?=$header_akun?>">
                        <div class="invalkode-feedback" kode="errorheader_akun"></div>
                        <?php 
                        // contoh mendapatkan error per komponen
                        if(isset($validation)){
                            if($validation->getError('header_akun')) {?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-invalkode
                                    document.getElementBykode('header_akun').setAttribute("class", "form-control is-invalkode");
                                    document.getElementBykode('errorheader_akun').innerHTML = "<?=$validation->getError('header_akun'); ?>";
                                    // serta tambahkan div class invalkode
                                </script>
                            <?php 
                            }else{
                                // tkodeak ada error di nama_kos maka nilai is-invalkode dihapuskan
                                ?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is valkode
                                    document.getElementBykode('header_akun').setAttribute("class", "form-control is-valkode");
                                    document.getElementBykode('errorheader_akun').innerHTML = "";
                                    // serta tambahkan div class invalkode
                                </script>
                                <?php
                            }
                        }?> 
                    </div>
                </div>
               
               

                <!-- /.card-body -->
                <div class="mb-3 row">
                <div class="col-sm-5"></div>
                <input class="col-sm-1 btn btn-success" type="submit" value="Ubah">
                <div class="col-sm-5"></div>
                </div>
                
                <div class="col-md-12">
                      <?php
                          if(isset($validation)){
                      ?>
                          <div class="alert alert-danger d-flex align-items-center" role="alert">
                              <svg xmlns="http://www.w3.org/2000/svg" wkodeth="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                                  <?=$validation->listErrors();?>
                              </div>
                          </div>
                      <?php
                          }
                      ?>
                  </div>
              </form>
            </div>
            <!-- /.card -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-flukode -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->