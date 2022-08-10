<div class="main-content">
        <section class="section">
          <div class="section-header">
          <h1 class="h2"><?= esc($title) ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?=base_url('menu/view')?>">Master Data</a></div>
            </div>
          </div>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form <?= esc($title)?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?=base_url('coa/add')?>" method="post" novalidate>
                <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama coa</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nama_coa" placeholder="Masukkan Nama coa" name="nama_coa" value="<?= set_value('nama_coa')?>">
                      <div class="invalid-feedback" id="errornama_coa"></div>
                        <?php 
                        // contoh mendapatkan error per komponen
                        if(isset($validation)){
                            if($validation->getError('nama_coa')) {?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-invalid
                                    document.getElementById('nama_coa').setAttribute("class", "form-control is-invalid");
                                    document.getElementById('errornama_coa').innerHTML = "<?=$validation->getError('nama_coa'); ?>";
                                    // serta tambahkan div class invalid
                                </script>
                            <?php 
                            }else{
                                // tidak ada error di nama_kos maka nilai is-invalid dihapuskan
                                ?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-valid
                                    document.getElementById('nama_coa').setAttribute("class", "form-control is-valid");
                                    document.getElementById('errornama_coa').innerHTML = "";
                                    // serta tambahkan div class is valid
                                </script>
                                <?php
                            }
                        }?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Header Akun</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="header_akun" name="header_akun" placeholder="Masukkan header_akun coa" value="<?= set_value('header_akun')?>">
                        <div class="invalid-feedback" id="errorheader_akun"></div>
                        <?php 
                        // contoh mendapatkan error per komponen
                        if(isset($validation)){
                            if($validation->getError('header_akun')) {?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-invalid
                                    document.getElementById('header_akun').setAttribute("class", "form-control is-invalid");
                                    document.getElementById('errorheader_akun').innerHTML = "<?=$validation->getError('header_akun'); ?>";
                                    // serta tambahkan div class invalid
                                </script>
                            <?php 
                            }else{
                                // tidak ada error di nama_kos maka nilai is-invalid dihapuskan
                                ?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is valid
                                    document.getElementById('header_akun').setAttribute("class", "form-control is-valid");
                                    document.getElementById('errorheader_akun').innerHTML = "";
                                    // serta tambahkan div class invalid
                                </script>
                                <?php
                            }
                        }?> 
                    </div>
                </div>
                
                <div class="mb-3 row">
                <div class="col-sm-5"></div>
                <input class="col-sm-1 btn btn-success" type="submit" value="Input">
                <div class="col-sm-5"></div>
                </div>
              </form>
            </div>
            <!-- /.card -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->