<table class="table table-hover" id="datapegawai">
            <thead>
              <tr>
                <th scope="col">Id Pegawai</th>
                <th scope="col">Nama Pegawai</th>
                <th scope="col">Telepon</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                  // looping hasil pegawai dari database
                  foreach($tampildata as $row):
                      ?>
                          <tr>
                            <th scope="row"><?=$row['id_pegawai']?></th>
                            <td><?=$row['nama_pegawai']?></td>
                            <td><?=$row['telepon']?></td>
                            <td>
                               <a href="<?=base_url('pegawai/viewData/'.$row['id_pegawai'])?>" class="btn btn-primary btn-sm">Ubah</a>
                               <a onclick="deleteConfirm('<?php echo base_url('pegawai/delete/'.$row['id']) ?>')" href="#" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Hapus</a>
                               
                            </td>
                          </tr>
                      <?php
                  endforeach;
              
              ?>
              
            </tbody>
        </table>
        <script>
            $(document).ready(function(){
                    $('#datapegawai').DataTable();
                }
            );
        </script>