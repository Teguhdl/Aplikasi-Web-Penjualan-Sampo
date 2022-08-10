<table class="table table-hover" id="datacoa">
            <thead>
              <tr>
                <th scope="col">kode coa</th>
                <th scope="col">Nama coa</th>
                <th scope="col">Header Akun</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                  // looping hasil coa dari database
                  foreach($tampildata as $row):
                      ?>
                          <tr>
                            <th scope="row"><?=$row['kode_coa']?></th>
                            <td><?=$row['nama_coa']?></td>
                            <td><?=$row['header_akun']?></td>
                            <td>
                               <a href="<?=base_url('coa/viewData/'.$row['kode_coa'])?>" class="btn btn-primary btn-sm">Ubah</a>
                               <a onclick="deleteConfirm('<?php echo base_url('coa/delete/'.$row['id']) ?>')" href="#" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Hapus</a>
                               
                            </td>
                          </tr>
                      <?php
                  endforeach;
              
              ?>
              
            </tbody>
        </table>
        <script>
            $(document).ready(function(){
                    $('#datacoa').DataTable();
                }
            );
        </script>