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
        <form action="<?=base_url('penjualan/add')?>" method="post" novalidate>
        <div class="card-body">
                <div class="form-group row">
                <label for="id_pelanggan" class="col-sm-2 col-form-label">Pilih Pelanggan</label>
                  <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" id="id_pelanggan" name="id_pelanggan">
                        <option value="" selected disabled>Pilih Pelanggan</option>
                            <?php
                                //looping sampo
                                foreach($pelanggan as $row):
                                   
                                    $id_pelanggan = $row->id_pelanggan;
                                    $nama_pelanggan = $row->nama_pelanggan;

                                    if(set_value('id_pelanggan')==$id_pelanggan){
                                      ?>
                                        <option value="<?= $id_pelanggan ?>" selected><?= $nama_pelanggan.'('.$id_pelanggan.')'?></option>
                                      <?php
                                    }else{
                                      ?>
                                        <option value="<?= $id_pelanggan ?>"><?= $nama_pelanggan.'('.$id_pelanggan.')' ?></option>
                                      <?php
                                    }
                                endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback" id="errorpelanggan"></div>
                        <?php 
                        // contoh mendapatkan error per komponen
                        if(isset($validation)){
                            if($validation->getError('id_pelanggan')) {?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-invalid
                                    document.getElementById('id_pelanggan').setAttribute("class", "form-control is-invalid");
                                    document.getElementById('errorpelanggan').innerHTML = "<?=$validation->getError('id_pelanggan'); ?>";
                                    // serta tambahkan div class invalid
                                </script>
                            <?php 
                            }else{
                                // tidak ada error di nama_kos maka nilai is-invalid dihapuskan
                                ?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-valid
                                    document.getElementById('id_pelanggan').setAttribute("class", "form-control is-valid");
                                    document.getElementById('errorpelanggan').innerHTML = "";
                                    // serta tambahkan div class is valid
                                </script>
                                <?php
                            }
                        }?>
                    </div>
                    </div>
              

              
                <div class="form-group row">
                <label for="id_sampo" class="col-sm-2 col-form-label">Pilih Sampo</label>
                  <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" id="id_sampo" name="id_sampo">
                        <option value="" selected disabled>Pilih Sampo</option>
                            <?php
                                //looping sampo
                                foreach($sampo as $row):
                                   
                                    $id_sampo = $row->id_sampo;
                                    $nama_produk = $row->nama_produk;
                                    $ukuran = $row->ukuran;
                                    $harga = $row->harga;

                                    if(set_value('id_sampo')==$id_sampo){
                                      ?>
                                        <option value="<?= $id_sampo ?>" selected><?= $nama_produk.'('.$ukuran.')'?></option>
                                      <?php
                                    }else{
                                      ?>
                                        <option value="<?= $id_sampo ?>"><?= $nama_produk.'('.$ukuran.')' ?></option>
                                      <?php
                                    }
                                endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback" id="errorsampo"></div>
                        <?php 
                        // contoh mendapatkan error per komponen
                        if(isset($validation)){
                            if($validation->getError('id_sampo')) {?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-invalid
                                    document.getElementById('id_sampo').setAttribute("class", "form-control is-invalid");
                                    document.getElementById('errorsampo').innerHTML = "<?=$validation->getError('id_sampo'); ?>";
                                    // serta tambahkan div class invalid
                                </script>
                            <?php 
                            }else{
                                // tidak ada error di nama_kos maka nilai is-invalid dihapuskan
                                ?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-valid
                                    document.getElementById('id_sampo').setAttribute("class", "form-control is-valid");
                                    document.getElementById('errorsampo').innerHTML = "";
                                    // serta tambahkan div class is valid
                                </script>
                                <?php
                            }
                        }?>
                    </div>
                    </div>
                
                
                   
                    <div class="form-group row">
                  <label for="jenis_produk" class="col-sm-2 col-form-label">Tanggal Jual</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl_jual" name="tgl_jual" value="<?= set_value('tgl_jual')?>" placeholder="Diisi dengan tanggal">
                    <div class="invalid-feedback" id="errortgl_jual"></div>            
                  </div>
                </div>   
                

                <?php 
                    // contoh mendapatkan error per komponen tanggal mulai
                    if(isset($validation)){
                        if($validation->getError('tgl_jual')) {?>
                            <script>
                                // modifikasi elemen class input form untuk tgl_jual menjadi is-invalid
                                document.getElementById('tgl_jual').setAttribute("class", "form-control is-invalid");
                                document.getElementById('errortgl_jual').innerHTML = "<?=$validation->getError('tgl_jual'); ?>";
                                // serta tambahkan div class invalid
                            </script>
                        <?php 
                        }else{
                            // tidak ada error di tgl_jual maka nilai is-invalid dihapuskan
                            ?>
                            <script>
                                // modifikasi elemen class input form untuk tgl_jual menjadi is-valid
                                document.getElementById('tgl_jual').setAttribute("class", "form-control is-valid");
                                document.getElementById('errortgl_jual').innerHTML = "";
                                // serta tambahkan div class is valid
                            </script>
                            <?php
                        }
                    }?>
                    
               <div class="form-group row">
                  <label for="jenis_produk" class="col-sm-2 col-form-label">qty Jual</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="qty" name="qty" placeholder="qty Jual" value="<?= set_value('qty')?>" >
                  <div class="invalid-feedback" id="errorqty"></div>
                        <?php 
                        // contoh mendapatkan error per komponen
                        if(isset($validation)){
                            if($validation->getError('qty')) {?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-invalid
                                    document.getElementById('qty').setAttribute("class", "form-control is-invalid");
                                    document.getElementById('errorqty').innerHTML = "<?=$validation->getError('id_qty'); ?>";
                                    // serta tambahkan div class invalid
                                </script>
                            <?php 
                            }else{
                                // tidak ada error di nama_kos maka nilai is-invalid dihapuskan
                                ?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-valid
                                    document.getElementById('qty').setAttribute("class", "form-control is-valid");
                                    document.getElementById('errorqty').innerHTML = "";
                                    // serta tambahkan div class is valid
                                </script>
                                <?php
                            }
                        }?>
                    </div>
                  </div>
                  
              
                  
                  <div class="form-group row">
                  <label for="jenis_produk" class="col-sm-2 col-form-label">Harga Per Item</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="harga" name="harga" placeholder="harga" value="<?= set_value('harga')?>" readonly>
                  </div>
                </div> 
                

             
                <div class="form-group row">
                  <label for="jenis_produk" class="col-sm-2 col-form-label">Harga Jual</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga jual"  readonly>
                  </div>
                </div>  
                  

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



     
