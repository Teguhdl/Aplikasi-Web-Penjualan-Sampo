<table class="table table-hover" id="tabelpemodalan">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col" style="text-align:center">Modal</th>
                <th scope="col" style="text-align:center">Keterangan</th>
                <th scope="col" style="text-align:center">Tanggal</th>
                <th scope="col" style="text-align:center">Menu</th>
                <th scope="col" style="text-align:center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                  // looping hasil penghuni dari database
                  foreach($datapemodalan as $row):
                      ?>
                          <tr>
                            <td scope="row" style="text-align:center"><?=$row['id_transaksi']?></td>
                            <td style="text-align:center"><?=format_rupiah($row['besar'])?></td>
                            <td style="text-align:center"><?=$row['nama']?></td>
                            <td style="text-align:center"><?=$row['waktu']?></td>
                            <td style="text-align:center"><?=$row['nama_produk']?></td>
                            <td style="text-align:center">
                               <button onclick="deleteConfirm('<?php echo base_url('pemodalan/delete/'.$row['id_transaksi']) ?>')" href="#" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Hapus</a>
                               
                            </td>
                          </tr>
                      <?php
                  endforeach;
              
              ?>
              
            </tbody>
        </table>
        <script>
            $(document).ready(function(){
                    $('#tabelpemodalan').DataTable();
                }
            );
        </script>

        <!-- Tampil Modal Ubah -->
        <script>

          //number format
          function number_format(number, decimals, dec_point, thousands_point) {

            if (number == null || !isFinite(number)) {
                throw new TypeError("number is not valid");
            }

            if (!decimals) {
                var len = number.toString().split(',').length;
                decimals = len > 1 ? len : 0;
            }

            if (!dec_point) {
                dec_point = '.';
            }

            if (!thousands_point) {
                thousands_point = ',';
            }

            number = parseFloat(number).toFixed(decimals);

            number = number.replace(",", dec_point);

            var splitNum = number.split(dec_point);
            splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
            number = splitNum.join(dec_point);

            return number;
          }

          
        </script>


        <!-- script untuk jquery jika disubmit tombol simpan di form formubahpemodalan -->
          <script>
              $(document).ready(function()
                  {   		
                      $('.formubahpemodalan').submit(function(e)
                          {
                              e.preventDefault();
                                  $.ajax(
                                      {
                                          type: "post",
                                          url: $(this).attr('action'),
                                          data: $(this).serialize(),
                                          dataType: "json",
                                          success: function (response){
                                              // console.log('kssss');
                                              // jika responsenya adalah error
                                              if(response.error){
                                                if(response.error.idmenu){
                                                    $('#idmenu').addClass('is-invalid');
                                                    $('.erroridmenu').html(response.error.idmenu);
                                                }else{
                                                    $('#idmenu').removeClass('is-invalid');
                                                    $('.erroridmenu').html();
                                                }
                                                if(response.error.besarmodal){
                                                    $('#besarmodal').addClass('is-invalid');
                                                    $('.errorbesarmodal').html(response.error.besarmodal);
                                                }else{
                                                    $('#besarmodal').removeClass('is-invalid');
                                                    $('.errorbesarmodal').html();
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
                                                  // alert(response.sukses);
                                                  // tutup modal
                                                  $('#ubahModal').modal('hide');
                                                  datapemodalan(); //refresh data penghuni otomatis
                                                  // tampilkan alert pesan

                                                  Swal.fire({
                                                      title: 'Berhasil!',
                                                      text: response.sukses,
                                                      icon: 'success',
                                                      confirmButtonText: 'Ok'
                                                  })

                                              }
                                          },
                                          error: function(xhr, ajaxOptions, thrownError){
                                              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                                          } 
                                      } 
                                  );
                                  return false;
                          }
                      );
                  }
              );
          </script>
          <!-- akhir script untuk jquery -->  

        <!-- Akhir Tampil Modal Ubah -->

        