<table class="table table-hover" id="datasupplier">
            <thead>
              <tr>
                <th scope="col">Id supplier</th>
                <th scope="col">Nama supplier</th>
                <th scope="col">Telepon</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                  // looping hasil supplier dari database
                  foreach($tampildata as $row):
                      ?>
                          <tr>
                            <th scope="row"><?=$row['id_supplier']?></th>
                            <td><?=$row['nama_supplier']?></td>
                            <td><?=$row['telepon']?></td>
                            <td>
                               <a href="<?=base_url('supplier/viewData/'.$row['id_supplier'])?>" class="btn btn-primary btn-sm">Ubah</a>
                               <a onclick="deleteConfirm('<?php echo base_url('supplier/delete/'.$row['id']) ?>')" href="#" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Hapus</a>
                               
                            </td>
                          </tr>
                      <?php
                  endforeach;
              
              ?>
              
            </tbody>
        </table>
        <script>
            $(document).ready(function(){
                    $('#datasupplier').DataTable();
                }
            );
        </script>