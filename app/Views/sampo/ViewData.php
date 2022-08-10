          <table class="table table-hover" id="tabelsampo">
            <thead>
              <tr>
                <th scope="col">Id Sampo</th>
                <th scope="col" style="text-align:center">ukuran</th  >
                <th scope="col" style="text-align:center">Harga</th>
                <th scope="col" style="text-align:center">Stok</th>
                <th scope="col" style="text-align:center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                  // looping hasil penghuni dari database
                  foreach($tampildata as $row):
                      ?>
                          <tr>
                            <td scope="row" style="text-align:center"><?=$row['id_sampo']?></td>
                            <td style="text-align:center"><?=$row['ukuran']?></td>
                            <td style="text-align:center"><?=format_rupiah($row['harga'])?></td>
                            <td style="text-align:center"><?=$row['stok']?></td>
                            <td style="text-align:center">
                               <a href="#" class="btn btn-success btn-sm tampilmodalubah" data-toogle="modal" data-target="#ubahModal" data-id="<?=$row['id_sampo']?>">Ubah</a>
                               <button onclick="deleteConfirm('<?php echo base_url('sampo/delete/'.$row['id_sampo']) ?>')" href="#" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Hapus</a>
                               
                            </td>
                          </tr>
                      <?php
                  endforeach;
              
              ?>
              
            </tbody>
        </table>
        <script>
            $(document).ready(function(){
                    $('#tabelsampo').DataTable();
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
                thousands_point = '.';
            }

            number = parseFloat(number).toFixed(decimals);

            number = number.replace(",", dec_point);

            var splitNum = number.split(dec_point);
            splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
            number = splitNum.join(dec_point);

            return number;
          }

          // jika tampilmodalubah di klik
          $(function(){
            $('.tampilmodalubah').on('click', function(){
              $('#labelmodalubah').html('Ubah Data sampo');  
              $('.formubahsampo').attr('action','<?=base_url('sampo/update')?>');
              $('#ubahModal').modal('show');
            //   console.log('ok');
              const id = $(this).data('id');
              $.ajax(
                {
                  url: '<?=base_url('sampo/ambildatasampoByIdsampoPost')?>',
                  data: {id: id},
                  method: 'post',
                  dataType: 'json',
                  success: function(data){
                    $('#ukuran').val(data[0].ukuran);
                    $('#harga').val(number_format(data[0].harga));
                    $('#stok').val(number_format(data[0].stok));
                    $('#idsampohidden').val(data[0].id_sampo);
                    $('#idmenuhidden').val(data[0].id_produk);
                    // console.log(data);
                    // console.log(data[0].ukuran);
                  }
                }
              );
            });
          });
        </script>


        <!-- script untuk jquery input sampo -->
          <script>
              $(document).ready(function()
                  {   		
                      $('.formubahsampo').submit(function(e)
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
                                                  if(response.error.ukuran){
                                                      $('#ukuran').addClass('is-invalid');
                                                      $('.errorukuran').html(response.error.ukuran);
                                                  }else{
                                                      $('#ukuran').removeClass('is-invalid');
                                                      $('.errorukuran').html();
                                                  }
                                        
                                                  if(response.error.harga){
                                                      $('#harga').addClass('is-invalid');
                                                      $('.errorharga').html(response.error.harga);
                                                  }else{
                                                      $('#harga').removeClass('is-invalid');
                                                      $('.errorharga').html();
                                                  }
                                                  if(response.error.stok){
                                                      $('#stok').addClass('is-invalid');
                                                      $('.errorstok').html(response.error.stok);
                                                  }else{
                                                      $('#stok').removeClass('is-invalid');
                                                      $('.errorstok').html();
                                                  }
                                              }else{
                                                  // muncul pesan sukses
                                                  // alert(response.sukses);
                                                  // tutup modal
                                                  $('#ubahModal').modal('hide');
                                                  datasampo(); //refresh data penghuni otomatis
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