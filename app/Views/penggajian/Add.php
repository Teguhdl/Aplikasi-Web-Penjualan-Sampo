<div class="main-content">
        <section class="section">
          <div class="section-header">
          <h1 class="h2"><?= esc($title) ?></h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?=base_url('menu/view')?>">Master Data</a></div>
              <div class="breadcrumb-item"><a href="<?=base_url('penjualan/view')?>">Transaksi</a></div>
            </div>
          </div>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380" hidden></canvas>

      <div class="alert alert-success" role="alert">
          <?php 
            $session = session();
            echo "Selamat datang ".$session->get('user_name');            
          ?>
      </div>
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form <?= esc($title) ?></h3>
              </div>
        <form action="<?=base_url('penggajian/add')?>" method="post" novalidate>
        <div class="card-body">
                <div class="form-group row">
                <label for="id_pegawai" class="col-sm-2 col-form-label">Pilih Pegawai</label>
                  <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" id="id_pegawai" name="id_pegawai">
                        <option value="" selected disabled>Pilih pegawai</option>
                            <?php
                                //looping sampo
                                foreach($pegawai as $row):
                                   
                                    $id_pegawai = $row->id_pegawai;
                                    $nama_pegawai = $row->nama_pegawai;

                                    if(set_value('id_pegawai')==$id_pegawai){
                                      ?>
                                        <option value="<?= $id_pegawai ?>" selected><?= $nama_pegawai.'('.$id_pegawai.')'?></option>
                                      <?php
                                    }else{
                                      ?>
                                        <option value="<?= $id_pegawai ?>"><?= $nama_pegawai.'('.$id_pegawai.')' ?></option>
                                      <?php
                                    }
                                endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback" id="errorpegawai"></div>
                        <?php 
                        // contoh mendapatkan error per komponen
                        if(isset($validation)){
                            if($validation->getError('id_pegawai')) {?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-invalid
                                    document.getElementById('id_pegawai').setAttribute("class", "form-control is-invalid");
                                    document.getElementById('errorpegawai').innerHTML = "<?=$validation->getError('id_pegawai'); ?>";
                                    // serta tambahkan div class invalid
                                </script>
                            <?php 
                            }else{
                                // tidak ada error di nama_kos maka nilai is-invalid dihapuskan
                                ?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-valid
                                    document.getElementById('id_pegawai').setAttribute("class", "form-control is-valid");
                                    document.getElementById('errorpegawai').innerHTML = "";
                                    // serta tambahkan div class is valid
                                </script>
                                <?php
                            }
                        }?>
                    </div>
                    </div>
              
                    <div class="form-group row">
                  <label for="jenis_produk" class="col-sm-2 col-form-label">Jumlah</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" >
                  <div class="invalid-feedback" id="errorjumlah"></div>
                        <?php 
                        // contoh mendapatkan error per komponen
                        if(isset($validation)){
                            if($validation->getError('jumlah')) {?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-invalid
                                    document.getElementById('jumlah').setAttribute("class", "form-control is-invalid");
                                    document.getElementById('errorjumlah').innerHTML = "<?=$validation->getError('id_jumlah'); ?>";
                                    // serta tambahkan div class invalid
                                </script>
                            <?php 
                            }else{
                                // tidak ada error di nama_kos maka nilai is-invalid dihapuskan
                                ?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-valid
                                    document.getElementById('jumlah').setAttribute("class", "form-control is-valid");
                                    document.getElementById('errorjumlah').innerHTML = "";
                                    // serta tambahkan div class is valid
                                </script>
                                <?php
                            }
                        }?>
                    </div>
                  </div>
                  

              
        
                
                   
                    <div class="form-group row">
                  <label for="jenis_produk" class="col-sm-2 col-form-label">Tanggal penggajian</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl_penggajian" name="tgl_penggajian" value="<?= set_value('tgl_penggajian')?>" placeholder="Diisi dengan tanggal">
                    <div class="invalid-feedback" id="errortgl_penggajian"></div>            
                  </div>
                </div>   
                

                <?php 
                    // contoh mendapatkan error per komponen tanggal mulai
                    if(isset($validation)){
                        if($validation->getError('tgl_penggajian')) {?>
                            <script>
                                // modifikasi elemen class input form untuk tgl_penggajian menjadi is-invalid
                                document.getElementById('tgl_penggajian').setAttribute("class", "form-control is-invalid");
                                document.getElementById('errortgl_penggajian').innerHTML = "<?=$validation->getError('tgl_penggajian'); ?>";
                                // serta tambahkan div class invalid
                            </script>
                        <?php 
                        }else{
                            // tidak ada error di tgl_penggajian maka nilai is-invalid dihapuskan
                            ?>
                            <script>
                                // modifikasi elemen class input form untuk tgl_penggajian menjadi is-valid
                                document.getElementById('tgl_penggajian').setAttribute("class", "form-control is-valid");
                                document.getElementById('errortgl_penggajian').innerHTML = "";
                                // serta tambahkan div class is valid
                            </script>
                            <?php
                        }
                    }?>
                  
                  

                <div class="mb-3 row">
                <div class="col-sm-5"></div>
                <input type="submit" class="col-sm-1 btn btn-success"  value="Submit" ></input>
                <div class="col-sm-5"></div>
            </form>
            </div>
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

     
    </main>
  </div>
</div>



     
