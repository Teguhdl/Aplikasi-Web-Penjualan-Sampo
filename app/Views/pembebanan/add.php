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

        <div class="row">
        <form action="<?=base_url('pembebanan/add')?>" method="post" novalidate>

        
                <div class="mb-3 row">
                <label for="id_produk" class="col-sm-2 col-form-label">Pilih Produk</label>
                  <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" id="id_produk" name="id_produk">
                        <option value="" selected disabled>Pilih menu</option>
                            <?php
                                //looping menu
                                foreach($menu as $row):
                                   
                                    $id_produk = $row->id_produk;
                                    $nama_produk = $row->nama_produk;

                                    if(set_value('id_produk')==$id_produk){
                                      ?>
                                        <option value="<?= $id_produk ?>" selected><?= $nama_produk.''?></option>
                                      <?php
                                    }else{
                                      ?>
                                        <option value="<?= $id_produk ?>"><?= $nama_produk.'' ?></option>
                                      <?php
                                    }
                                endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback" id="errormenu"></div>
                        <?php 
                        // contoh mendapatkan error per komponen
                        if(isset($validation)){
                            if($validation->getError('id_produk')) {?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-invalid
                                    document.getElementById('id_produk').setAttribute("class", "form-control is-invalid");
                                    document.getElementById('errormenu').innerHTML = "<?=$validation->getError('id_produk'); ?>";
                                    // serta tambahkan div class invalid
                                </script>
                            <?php 
                            }else{
                                // tidak ada error di nama_kos maka nilai is-invalid dihapuskan
                                ?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-valid
                                    document.getElementById('id_produk').setAttribute("class", "form-control is-valid");
                                    document.getElementById('errormenu').innerHTML = "";
                                    // serta tambahkan div class is valid
                                </script>
                                <?php
                            }
                        }?>
                    </div>
                    </div>
                

            
               <div class="mb-3 row">
                  <label for="jenis_produk" class="col-sm-2 col-form-label">Nama Beban</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama_beban" name="nama_beban" placeholder="Nama Beban"  >
                  <div class="invalid-feedback" id="errornama_beban"></div>
                        <?php 
                        // contoh mendapatkan error per komponen
                        if(isset($validation)){
                            if($validation->getError('nama_beban')) {?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-invalid
                                    document.getElementById('nama_beban').setAttribute("class", "form-control is-invalid");
                                    document.getElementById('errornama_beban').innerHTML = "<?=$validation->getError('id_nama_beban'); ?>";
                                    // serta tambahkan div class invalid
                                </script>
                            <?php 
                            }else{
                                // tidak ada error di nama_kos maka nilai is-invalid dihapuskan
                                ?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-valid
                                    document.getElementById('nama_beban').setAttribute("class", "form-control is-valid");
                                    document.getElementById('errornama_beban').innerHTML = "";
                                    // serta tambahkan div class is valid
                                </script>
                                <?php
                            }
                        }?>
                    </div>
                  </div>
              

                <div class="mb-3 row">
                  <label for="jenis_produk" class="col-sm-2 col-form-label">Biaya</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="biaya" name="biaya" placeholder="biaya Beban">
                  <?php 
                        // contoh mendapatkan error per komponen
                        if(isset($validation)){
                            if($validation->getError('biaya')) {?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-invalid
                                    document.getElementById('biaya').setAttribute("class", "form-control is-invalid");
                                    document.getElementById('errorbiaya').innerHTML = "<?=$validation->getError('id_biaya'); ?>";
                                    // serta tambahkan div class invalid
                                </script>
                            <?php 
                            }else{
                                // tidak ada error di nama_kos maka nilai is-invalid dihapuskan
                                ?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-valid
                                    document.getElementById('biaya').setAttribute("class", "form-control is-valid");
                                    document.getElementById('errorbiaya').innerHTML = "";
                                    // serta tambahkan div class is valid
                                </script>
                                <?php
                            }
                        }?>
                  </div>
                </div> 

                <div class="form-group row">
                  <label for="jenis_produk" class="col-sm-2 col-form-label">Tanggal Bayar</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" value="<?= set_value('tgl_bayar')?>" placeholder="Diisi dengan tanggal">
                    <div class="invalid-feedback" id="errortgl_bayar"></div>            
                  </div>
                </div>   
                

                <?php 
                    // contoh mendapatkan error per komponen tanggal mulai
                    if(isset($validation)){
                        if($validation->getError('tgl_bayar')) {?>
                            <script>
                                // modifikasi elemen class input form untuk tgl_bayar menjadi is-invalid
                                document.getElementById('tgl_bayar').setAttribute("class", "form-control is-invalid");
                                document.getElementById('errortgl_bayar').innerHTML = "<?=$validation->getError('tgl_bayar'); ?>";
                                // serta tambahkan div class invalid
                            </script>
                        <?php 
                        }else{
                            // tidak ada error di tgl_bayar maka nilai is-invalid dihapuskan
                            ?>
                            <script>
                                // modifikasi elemen class input form untuk tgl_bayar menjadi is-valid
                                document.getElementById('tgl_bayar').setAttribute("class", "form-control is-valid");
                                document.getElementById('errortgl_bayar').innerHTML = "";
                                // serta tambahkan div class is valid
                            </script>
                            <?php
                        }
                    }?>


      

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

     
    </main>
  </div>
</div>



     
