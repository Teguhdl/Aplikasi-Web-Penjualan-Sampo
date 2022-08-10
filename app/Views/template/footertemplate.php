
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?=base_url()?>/template/assets/js/stisla.js"></script>
  <script src="<?=base_url('js/bootstrap.bundle.min.js')?>"></script>


  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?=base_url()?>/template/assets/js/scripts.js"></script>
  <script src="<?=base_url()?>/template/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="<?= base_url('/template/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('/template/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>

<script>
  $(function() {
    var harga_jual = document.getElementById('harga_jual');
    var total_amount = function() {
      var sum = 0;
      var harga = $('#harga').val();
      $('#qty').each(function() {
        var qty = $(this).val();
        if (qty != 0) {
          sum = qty * harga;
        }
      });

      $('#harga_jual').val(sum);
      
    }

    $('#qty').keyup(function(){
      total_amount();
    })
    
  })
</script>

<script>
  $('#id_sampo').on('change', (event) => {
      getsampo(event.target.value).then(barang => {
          $('#harga').val(barang.harga);
      });
  });

  async function getsampo(idsampo) {
    let response = await fetch('api/penjualan/'+idsampo);
    let data = await response.json();

    return data;
  }

</script>

<script>
  $(function () {
    $("#myTable2").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#myTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  </script> 
<!-- Jquery Masking -->
<script src="<?= base_url('jquery/jquery.mask.js')?>"></script>

<!-- Awal Masking -->
<script>
        $(document).ready(function(){
          // Format .
          $('#no_telp').mask('0000-0000-0000', {reverse: true});	
          $('#header_akun').mask('0-0000', {reverse: true});	
        })
	</script>
    <!-- Akhir Masking -->

</body>
</html>
