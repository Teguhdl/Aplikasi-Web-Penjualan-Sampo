<table class="table table-hover" id="datapelanggan">
            <thead>
              <tr>
                <th scope="col">Id pelanggan</th>
                <th scope="col">Nama pelanggan</th>
                <th scope="col">Telepon</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                  // looping hasil pelanggan dari database
                  foreach($tampildata as $row):
                      ?>
                          <tr>
                            <th scope="row"><?=$row['id_pelanggan']?></th>
                            <td><?=$row['nama_pelanggan']?></td>
                            <td><?=$row['telepon']?></td>
                            <td>
                               <a href="<?=base_url('pelanggan/viewData/'.$row['id_pelanggan'])?>" class="btn btn-primary btn-sm">Ubah</a>
                               <a onclick="deleteConfirm('<?php echo base_url('pelanggan/delete/'.$row['id']) ?>')" href="#" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Hapus</a>
                               
                            </td>
                          </tr>
                      <?php
                  endforeach;
              
              ?>
              
            </tbody>
        </table>
        <script>
            $(document).ready(function(){
                    $('#datapelanggan').DataTable();
                }
            );
        </script>